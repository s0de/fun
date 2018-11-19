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
use Modules\Request\Models\Lead;

class LeadAdmin extends Admin
{
    public function getSearchColumns()
    {
        return ['name'];
    }

    public function getModel()
    {
        return new Lead;
    }

    public function getName()
    {
        return 'Лиды';
    }

    public function getItemName()
    {
        return 'Лид';
    }

    public function getQuerySet()
    {
        return parent::getQuerySet()->order(['-id']);
    }
}