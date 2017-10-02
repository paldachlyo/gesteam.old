<?php

namespace GT\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use GT\ClubBundle\Entity\Club;
use GT\ClubBundle\Form\ClubType;

class ClubController extends Controller
{
    public function indexAction($id_club)
    {
		$em = $this->getDoctrine()->getManager();

		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);

		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		return $this->render('GTClubBundle:Club:index.html.twig', array(
            'club' => $club
        ));
    }
	
	public function ajouterAction(Request $request) {
		$club = new Club();
		$form = $this->get('form.factory')->create(ClubType::class, $club);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($club);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'club bien enregistrée.');
			
			return $this->redirectToRoute('gt_admin_homepage');
		}

		return $this->render('GTAdminBundle:Club:ajouter.html.twig', array(
			'form' => $form->createView(),
			'club' => $club,
		));
	}
	
	/**
	 * Modifier un club
	 */
	public function modifierAction($id_club, Request $request) {
		$em = $this->getDoctrine()->getManager();
		
		// le club à modifier
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		$form = $this->get('form.factory')->create(ClubType::class, $club);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			$em->persist($club);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Club bien enregistré.');

			return $this->redirectToRoute('gt_admin_clubs');
		}

		return $this->render('GTAdminBundle:Club:modifier.html.twig', array(
			'club' => $club,
			'form' => $form->createView(),
		));
	}
	
	public function listeAction() {
		$em = $this->getDoctrine()->getManager();
		
		$clubs = $em->getRepository('GTClubBundle:Club')->findAll();
		
		return $this->render('GTAdminBundle:Club:clubs.html.twig', array(
			'clubs' => $clubs
		));
	}

}
