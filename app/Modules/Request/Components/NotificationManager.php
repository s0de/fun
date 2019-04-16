<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 25/12/2018 15:20
 */

namespace Modules\Request\Components;

use Modules\Mail\Components\MailerInterface;
use Modules\Request\Forms\RecallForm;
use Phact\Event\EventManagerInterface;
use Phact\Form\ModelForm;

class NotificationManager
{
    /**
     * @var EventManagerInterface
     */
    private $eventManager;

    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(EventManagerInterface $eventManager, MailerInterface $mailer)
    {
        $this->eventManager = $eventManager;
        $this->mailer = $mailer;
        $this->subscribe();
    }

    public function subscribe()
    {
        $this->eventManager->on('forms.saved', function (ModelForm $form) {
            $this->mailer->send("Заявка на звонок с сайта", 'mail/model.tpl', [
                'model' => $form->getInstance(),
                'logoPath' => '/static/images/base/logo.png'
            ]);
        }, RecallForm::class);
    }
}