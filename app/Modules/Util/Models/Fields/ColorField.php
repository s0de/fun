<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 23.07.2019 10:42
 */

namespace Modules\Util\Models\Fields;



use Phact\Form\Fields\DropDownField;
use Phact\Orm\Fields\CharField;


class ColorField extends CharField
{
    public function setUpFormField($config = [])
    {
        if (!$this->editable) {
            return null;
        }

        $class = \Modules\Util\Forms\Fields\ColorField::class;

        return array_merge([
            'class' => $class,
            'required' => $this->getIsRequired(),
            'label' => $this->label,
            'hint' => $this->hint,
            'value' => $this->default,
            'choices' => $this->choices
        ], $config);
    }
}