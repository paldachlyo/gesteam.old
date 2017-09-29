<?php

namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GT\ClubBundle\Entity\Club;
use GT\ClubBundle\Form\ClubType;

class ClubController extends Controller
{
    public function indexAction($id_club)
    {
		$em = $this->getDoctrine()->getManager();

		// Pour récupérer un seul club, on utilise la méthode find($id)
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);

		// ou null si l'id $id n'existe pas, d'où ce if :
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		return $this->render('GTClubBundle:Club:index.html.twig', array(
            'club' => $club
        ));
    }
	
	public function creerAction(Request $request) {
		$club = new Club();
		$form = $this->get('form.factory')->create(ClubType::class, $club);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($club);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'club bien enregistrée.');
			
			return $this->redirectToRoute('gt_club_homepage', array('id_club' => $club->getId()));
		}

		return $this->render('GTClubBundle:Club:creer.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	public function showAction($page) {
		return $this->render('GTClubBundle:Default:index.html.twig', array(
            'pagename' => 'GTClubBundle:Club:index' . $page
        ));
	}
}
