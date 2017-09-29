<?php

namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MembreController extends Controller
{
    public function indexAction()
    {
        return $this->render('GTClubBundle:Membre:index.html.twig', array(
            // ...
        ));
    }

	public function membresAction($id_club) {
		$em = $this->getDoctrine()->getManager();
		
		// Le club
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		return $this->render('GTClubBundle:Membre:membres.html.twig', array(
            'club' => $club
        ));
	}
}
