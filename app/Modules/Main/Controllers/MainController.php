<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 25/07/2018 17:36
 */

namespace Modules\Main\Controllers;

use Phact\Components\BreadcrumbsInterface;
use Phact\Components\FlashInterface;
use Phact\Controller\Controller;
use Phact\Main\Phact;

class MainController extends Controller
{
    public function index(FlashInterface $flash, BreadcrumbsInterface $breadcrumbs)
    {
//        $flash->error('Error');
//        $flash->success('Success');
//
//        $breadcrumbs->add('Breadcrumb');

        echo $this->render("pages/index/index.tpl", [

        ]);
    }
}