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
use Phact\Event\EventManagerInterface;
use Phact\Request\HttpRequestInterface;
use Phact\Template\RendererInterface;

class RequestController extends Controller
{
    use FormsProcessor;

    /**
     * @var EventManagerInterface
     */
    private $eventManager;

    public function __construct(EventManagerInterface $eventManager, HttpRequestInterface $request, RendererInterface $renderer = null)
    {
        parent::__construct($request, $renderer);
        $this->eventManager = $eventManager;
    }

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
        $this->processInlineForm(new RecallForm(), $this->eventManager);
    }
}