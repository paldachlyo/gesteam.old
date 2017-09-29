<?php

namespace GT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GTCoreBundle:Default:index.html.twig');
    }
}
