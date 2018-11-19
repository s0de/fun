<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 25/07/2018 14:48
 */

namespace Modules\Main;

use Modules\Admin\Contrib\AdminMenuInterface;
use Modules\Main\Models\MainSettings;
use Phact\Module\Module;
use Modules\Admin\Traits\AdminTrait;

class MainModule extends Module implements AdminMenuInterface
{
    use AdminTrait;

    public function getSettingsModel()
    {
        return new MainSettings();
    }

    public function getVerboseName()
    {
        return "Основное";
    }
}