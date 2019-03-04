<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 15.02.2019 10:13
 */

namespace Modules\AsyncEvent;

use Phact\Module\Module;
use Modules\Admin\Traits\AdminTrait;
use Modules\Admin\Contrib\AdminMenuInterface;

class AsyncEventModule extends Module implements AdminMenuInterface
{
    use AdminTrait;
}
