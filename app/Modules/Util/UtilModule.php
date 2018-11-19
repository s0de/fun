<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 25/07/2018 17:56
 */

namespace Modules\Util;

use Modules\Admin\Contrib\AdminMenuInterface;
use Phact\Module\Module;
use Modules\Admin\Traits\AdminTrait;

class UtilModule extends Module implements AdminMenuInterface
{
    use AdminTrait;
}
