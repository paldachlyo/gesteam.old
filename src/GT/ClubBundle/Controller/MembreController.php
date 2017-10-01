<?php

namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GT\ClubBundle\Entity\Club;
use GT\ClubBundle\Entity\Membre;
use GT\ClubBundle\Form\MembreType;

class MembreController extends Controller
{
    public function indexAction()
    {
        return $this->render('GTClubBundle:Membre:index.html.twig', array(
            // ...
        ));
    }

	/**
	 * Affiche les membres d'un club
	 */
	public function membresAction($id_club) {
		$em = $this->getDoctrine()->getManager();
		
		// Le club
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		// les équipes
		$listeMembres = $em
			->getRepository('GTClubBundle:Membre')
			->findBy(array('club' => $club));
		
		return $this->render('GTClubBundle:Membre:membres.html.twig', array(
            'club' => $club,
			'membres' => $listeMembres
        ));
	}
	
	/**
	 * Créer un membre
	 */
	public function creerAction($id_club, Request $request) {
		$em = $this->getDoctrine()->getManager();
		
		// Le club
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		$membre = new Membre();
		$form = $this->get('form.factory')->create(MembreType::class, $membre);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			$membre->setClub($club);
			$em->persist($membre);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Membre bien enregistré.');

			return $this->redirectToRoute('gt_club_membres', array('id_club' => $club->getId()));
		}

		return $this->render('GTClubBundle:Membre:creer.html.twig', array(
			'club' => $club,
			'form' => $form->createView(),
		));
	}
	
	/**
	 * Modifier un membre
	 */
	public function modifierAction($id_membre, Request $request) {
		$em = $this->getDoctrine()->getManager();
		
		// le membre
		$membre = $em->getRepository('GTClubBundle:Membre')->find($id_membre);
		if (null === $membre) {
		  throw new NotFoundHttpException("Le mebre d'id ".$id_membre." n'existe pas.");
		}
		
		$club = $membre->getClub();
		$equipe = $membre->getEquipe();
		
		$form = $this->get('form.factory')->create(MembreMajType::class, $membre);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			$em->persist($membre);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Equipe bien enregistrée.');

			return $this->redirectToRoute('gt_club_membres', array('id_club' => $club->getId()));
		}

		return $this->render('GTClubBundle:Equipe:modifier.html.twig', array(
			'equipe' => $equipe,
			'club' => $club,
			'form' => $form->createView(),
		));
	}
}
