<?php

namespace Modules\Request\Forms;

use Modules\Request\Models\Recall;
use Modules\Util\Forms\Fields\PhoneField;
use Phact\Di\ComponentFetcher;
use Phact\Form\ModelForm;

class RecallForm extends ModelForm
{
    use ComponentFetcher;

    public $title = '';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

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
}