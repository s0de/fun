<?php

namespace Modules\Request\Contrib;


use Phact\Form\ModelForm;
use Phact\Main\Phact;

trait FormsProcessor
{
    public function processModelForm(ModelForm $form, $template, $successTemplate, $params = [], $safeAttributes = [])
    {
        if ($form->fill($_POST, $_FILES) && $form->valid && $form->save($safeAttributes)) {
            echo $this->render($successTemplate, $params);
            Phact::app()->end();
        }
        echo $this->render($template, array_merge([
            'form' => $form
        ], $params));
    }

    public function processInlineForm(ModelForm $form, $safeAttributes = [])
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
        }
        echo json_encode($data);
    }
}