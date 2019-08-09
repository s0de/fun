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

    public function __construct(
        string $name,
        EventManagerInterface $eventManager,
        CacheInterface $cacheDriver = null,
        Translate $translate = null
    )
    {
        $this->eventManager = $eventManager;
        parent::__construct($name, $cacheDriver, $translate);
    }

    public function getVerboseName()
    {
        return 'Заявки';
    }
}
