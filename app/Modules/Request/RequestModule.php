<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 25/07/2018 17:53
 */

namespace Modules\Request;

use Modules\Admin\Contrib\AdminMenuInterface;
use Modules\Request\Forms\RecallForm;
use Modules\Util\Components\Telegram;
use Phact\Event\EventManagerInterface;
use Phact\Module\Module;
use Modules\Admin\Traits\AdminTrait;
use Phact\Translate\Translate;
use Psr\SimpleCache\CacheInterface;

class RequestModule extends Module implements AdminMenuInterface
{
    use AdminTrait;

    /**
     * @var EventManagerInterface
     */
    private $eventManager;
    /**
     * @var Telegram
     */
    private $telegram;

    public function __construct(
        string $name,
        EventManagerInterface $eventManager,
        Telegram $telegram,
        CacheInterface $cacheDriver = null,
        Translate $translate = null
    )
    {
        $this->eventManager = $eventManager;
        $this->telegram = $telegram;
        parent::__construct($name, $cacheDriver, $translate);
    }

    public function getVerboseName()
    {
        return 'Заявки';
    }

    public function onApplicationInit()
    {
        $this->eventManager->on("forms.saved", function ($form, $attributes) {
            if (isset($attributes['phone']) && $attributes['phone']) {
                $this->telegram->send("Новая заявка: {$attributes['phone']}");
            }
        }, RecallForm::class);
    }
}
