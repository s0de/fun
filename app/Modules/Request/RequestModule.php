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
use Phact\Module\Module;
use Modules\Admin\Traits\AdminTrait;

class RequestModule extends Module implements AdminMenuInterface
{
    use AdminTrait;

    public function getVerboseName()
    {
        return 'Заявки';
    }
}
