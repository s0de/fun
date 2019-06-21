<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 26/07/2018 17:45
 */

namespace Modules\Main\Models;

use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\EmailField;
use Phact\Orm\Fields\FileField;
use Phact\Orm\Fields\TextField;
use Phact\Orm\Model;

class MainSettings extends Model
{
    public static function getFields()
    {
        return [
            'phone' => [
                'class' => CharField::class,
                'label' => 'Номер телефона',
                'null' => true
            ],
            'email' => [
                'class' => EmailField::class,
                'label' => 'E-mail',
                'null' => true
            ],
            'address' => [
                'class' => CharField::class,
                'label' => 'Адрес',
                'null' => true
            ],
            'address_lat' => [
                'class' => CharField::class,
                'label' => 'Адрес - Широта',
                'null' => true
            ],
            'address_lng' => [
                'class' => CharField::class,
                'label' => 'Адрес - Долгота',
                'null' => true
            ],
            'policy' => [
                'class' => FileField::class,
                'label' => 'Условия обработки персональных данных (PDF)',
                'md5Name' => true,
                'null' => true
            ],
            'counters' => [
                'class' => TextField::class,
                'label' => 'Счетчики',
                'null' => true
            ],
        ];
    }
} 