<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 25/07/2018 18:02
 */

namespace Modules\Request\Controllers;

use Modules\Request\Contrib\FormsProcessor;
use Modules\Request\Forms\RecallForm;
use Modules\Request\Models\Lead;
use Phact\Controller\Controller;

class RequestController extends Controller
{
    use FormsProcessor;

    public function lead()
    {
        if (isset($_POST['phone'])) {
            $lead = new Lead();
            $lead->phone = $_POST['phone'];
            $lead->save();
        }
    }

    public function recall()
    {
        $this->processInlineForm(new RecallForm());
    }
}