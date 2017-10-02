<?php

namespace GT\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GTAdminBundle:Default:index.html.twig');
    }
}
