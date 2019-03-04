<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 15.02.2019 11:42
 */

namespace Modules\AsyncEvent\Commands;


use Modules\AsyncEvent\Models\AsyncEvent;
use Phact\Commands\Command;
use Phact\Event\EventManagerInterface;

class AeCommand extends Command
{
    public function __construct(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function handle()
    {
        $items = AsyncEvent::objects()->all();

        foreach ($items as $item) {
            $params = unserialize($item->params);
            $sender = unserialize($item->sender);
            $this->eventManager->trigger('forms.saved', $params, $sender);
            $item->delete();
        }
    }
}