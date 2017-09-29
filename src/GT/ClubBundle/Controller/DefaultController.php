<?php

namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GTClubBundle:Default:index.html.twig', array(
            'pagename' => 'GTClubBundle:Default:index'
        ));
    }
}
