<?php

namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GT\ClubBundle\Entity\Club;

class DefaultController extends Controller
{
    public function indexAction($id_club=1) {
		$em = $this->getDoctrine()->getManager();
		
		// Le club
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
        return $this->render('GTClubBundle:Default:index.html.twig', array(
            'pagename' => 'GTClubBundle:Default:index',
			'club' => $club
        ));
    }
}
