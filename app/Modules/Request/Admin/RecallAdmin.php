<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 26/07/2018 17:52
 */

namespace Modules\Request\Admin;

use Modules\Admin\Contrib\Admin;
use Modules\Request\Models\Recall;

class RecallAdmin extends Admin
{
    public function getSearchColumns()
    {
        return ['phone'];
    }

    public function getModel()
    {
        return new Recall;
    }

    public function getName()
    {
        return 'Заявки на звонок';
    }

    public function getItemName()
    {
        return 'Заявка';
    }

    public function getQuerySet()
    {
        return parent::getQuerySet()->order(['-id']);
    }
}