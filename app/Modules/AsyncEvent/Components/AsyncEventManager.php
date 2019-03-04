<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 15.02.2019 11:06
 */

namespace Modules\AsyncEvent\Components;

use Modules\AsyncEvent\Models\AsyncEvent;

/**
 * Class AsyncEventManager
 * @package Modules\AsyncEvent\Components
 */
class AsyncEventManager implements AsyncEventManagerInterface
{
    /**
     * @param $name string AsyncEvent name
     * @param array $params
     * @param null $sender string|null Class name of sender or null
     */
    public function trigger($name, $params = [], $sender = null) {
        $event = new AsyncEvent();
        $event->name = $name;
        $event->params = serialize($params);
        $event->sender = serialize($sender);
        $event->save();
    }
}