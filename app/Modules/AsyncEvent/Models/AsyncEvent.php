<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 15.02.2019 10:14
 */

namespace Modules\AsyncEvent\Models;

use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\DateTimeField;
use Phact\Orm\Fields\TextField;
use Phact\Orm\Model;

class AsyncEvent extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class
            ],
            'params' => [
                'class' => TextField::class
            ],
            'sender' => [
                'class' => TextField::class
            ],
            'created_at' => [
                'class' => DateTimeField::class,
                'autoNowAdd' => true,
                'null' => true,
                'editable' => false
            ],
        ];
    }

    public function __toString()
    {
        return (string)$this->name;
    }
} 