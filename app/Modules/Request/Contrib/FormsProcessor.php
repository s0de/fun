<?php

namespace Modules\Request\Contrib;


use Modules\AsyncEvent\Components\AsyncEventManagerInterface;
use Phact\Form\ModelForm;
use Phact\Main\Phact;

trait FormsProcessor
{
    protected function processModelForm(ModelForm $form, AsyncEventManagerInterface $asyncEventManager = null, $template, $successTemplate, $params = [], $safeAttributes = [])
    {
        if ($form->fill($_POST, $_FILES) && $form->valid && $form->save($safeAttributes)) {
            $this->triggerFormSaved($form, $asyncEventManager);
            echo $this->render($successTemplate, $params);
            Phact::app()->end();
        }
        echo $this->render($template, array_merge([
            'form' => $form
        ], $params));
    }

    protected function processInlineForm(ModelForm $form, AsyncEventManagerInterface $asyncEventManager = null, $safeAttributes = [])
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
            $this->triggerFormSaved($form, $asyncEventManager);
        }
        echo json_encode($data);
    }

    protected function triggerFormSaved(ModelForm $form, AsyncEventManagerInterface $asyncEventManager = null)
    {
        if ($asyncEventManager) {
            $asyncEventManager->trigger('forms.saved', [$form->getAttributes()], $form);
        }
    }
}