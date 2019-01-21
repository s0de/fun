<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 21/01/2019 16:26
 */

namespace Modules\Main\Models;

use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\PositionField;
use Phact\Orm\Fields\TextField;
use Phact\Orm\Model;

class Review extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class,
                'label' => 'Имя',
            ],
            'date' => [
                'class' => CharField::class,
                'label' => 'Дата',
            ],
            'review' => [
                'class' => TextField::class,
                'label' => 'Отзыв',
            ],
            'response' => [
                'class' => TextField::class,
                'label' => 'Ответ',
            ],
            'position' => [
                'class' => PositionField::class,
                'editable' => false,
                'relations' => []
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->name;
    }
} 