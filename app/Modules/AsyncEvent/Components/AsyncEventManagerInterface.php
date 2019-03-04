<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 15.02.2019 11:54
 */

namespace Modules\AsyncEvent\Components;


interface AsyncEventManagerInterface
{
    public function trigger($name, $params = array(), $sender = null);
}