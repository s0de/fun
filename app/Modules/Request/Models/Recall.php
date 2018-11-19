<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 03/07/2018
 * Time: 14:50
 */

namespace Modules\Request\Models;

use Phact\Main\Phact;
use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\DateTimeField;
use Phact\Orm\Model;

class Recall extends Model
{
    public static function getFields()
    {
        return [
            'phone' => [
                'class' => CharField::class,
                'null' => true,
                'label' => 'Номер телефона'
            ],
            'created_at' => [
                'class' => DateTimeField::class,
                'autoNowAdd' => true,
                'null' => true,
                'editable' => false,
                'label' => 'Добавлено'
            ],
        ];
    }

    public function __toString()
    {
        return (string)$this->phone;
    }

    public function beforeSave()
    {
        Lead::clearSubmitted($this->phone);
        if (!PHACT_DEBUG && $this->phone != "+7 (111) 111-11-11") {
            Phact::app()->telegram->send("Новая заявка: {$this->phone}");
        }
        parent::beforeSave();
    }
} 