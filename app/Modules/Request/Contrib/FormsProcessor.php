<?php

namespace Modules\Request\Contrib;


use Phact\Event\EventManagerInterface;
use Phact\Form\ModelForm;
use Phact\Main\Phact;

trait FormsProcessor
{
    protected function processModelForm(ModelForm $form, EventManagerInterface $eventManager = null, $template, $successTemplate, $params = [], $safeAttributes = [])
    {
        if ($form->fill($_POST, $_FILES) && $form->valid && $form->save($safeAttributes)) {
            $this->triggerFormSaved($form, $eventManager);
            echo $this->render($successTemplate, $params);
            Phact::app()->end();
        }
        echo $this->render($template, array_merge([
            'form' => $form
        ], $params));
    }

    protected function processInlineForm(ModelForm $form, EventManagerInterface $eventManager = null, $safeAttributes = [])
    {
        if (!$this->request->getIsAjax() || !$this->request->getIsPost()) {
            $this->error(404);
        }
        $data = [
            'state' => 'success'
        ];
        if (!($form->fill($_POST) && $form->valid && $form->save($safeAttributes))) {
            $data = [
                'state' => 'error',
                'errors' => [
                    $form->classNameShort() => $form->getErrors()
                ]
            ];
        } else {
            $this->triggerFormSaved($form, $eventManager);
        }
        echo json_encode($data);
    }

    protected function triggerFormSaved(ModelForm $form, EventManagerInterface $eventManager = null)
    {
        if ($eventManager) {
            $eventManager->trigger('forms.saved', [$form->getAttributes()], $form);
        }
    }
}