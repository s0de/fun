<?php

namespace Modules\Util\Forms\Fields;

use Phact\Form\Fields\CharField;
use Phact\Main\Phact;

class PhoneField extends CharField
{
    public function __construct()
    {
        $this->_attributes = [
            'placeholder' => '+7 (___) ___-__-__',
            'data-lead-url' => Phact::app()->router->url('request:lead'),
            'data-phone-field' => ''
        ];
    }
}