<?php

namespace Modules\Request\Forms;

use Modules\Request\Models\Recall;
use Modules\Util\Forms\Fields\PhoneField;
use Phact\Form\ModelForm;
use Phact\Main\Phact;

class RecallForm extends ModelForm
{
    public $title = "";

    public function getFields()
    {
        return [
            'phone' => [
                'class' => PhoneField::class,
                'required' => true,
                'label' => 'Номер телефона'
            ]
        ];
    }

    public function getModel()
    {
        return new Recall;
    }

    public function getAbsoluteUrl()
    {
        return Phact::app()->router->url('request:recall');
    }
}