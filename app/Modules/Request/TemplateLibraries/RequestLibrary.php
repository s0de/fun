<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 26/07/2018 09:59
 */

namespace Modules\Request\TemplateLibraries;

use Modules\Request\Forms\RecallForm;
use Phact\Template\TemplateLibrary;

class RequestLibrary extends TemplateLibrary
{
    /**
     * @name get_recall_form
     * @kind accessorFunction
     * @return RecallForm
     */
    public static function getRecallForm()
    {
        return new RecallForm(['idPrefix' => 'i_' . uniqid() . '_']);
    }
}