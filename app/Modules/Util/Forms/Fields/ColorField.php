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

namespace Modules\Util\Forms\Fields;



use Phact\Form\Fields\CharField;
use Phact\Form\Fields\DropDownField;


class ColorField extends CharField
{
    public $inputTemplate = "_fields/color.tpl";
}