<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 03/07/2018
 * Time: 14:50
 */

namespace Modules\Request\Models;

use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\DateTimeField;
use Phact\Orm\Model;

class Lead extends Model
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
        return (string) $this->phone;
    }

    public function beforeSave()
    {
        static::clearSubmitted($this->phone);
        parent::beforeSave();
    }

    public static function clearSubmitted($phone)
    {
        $date = new \DateTime('-5 minutes');
        self::objects()->filter([
            'phone' => $phone,
            'created_at__gte' => $date->format('Y-m-d H:i:s')
        ])->delete();
    }
} 