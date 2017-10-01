<?php

namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GT\ClubBundle\Entity\Club;
use GT\ClubBundle\Form\ClubType;
use GT\ClubBundle\Entity\Equipe;
use GT\ClubBundle\Form\EquipeType;
use GT\ClubBundle\Form\EquipeMajType;

class EquipeController extends Controller
{
	/**
	 * Affiche une équipe
	 */
    public function indexAction($id_club, $id_equipe) {
		
		$em = $this->getDoctrine()->getManager();
		
		// Le club
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
        return $this->render('GTClubBundle:Equipe:index.html.twig', array(
            'club' => $club
        ));
    }
	
	/**
	 * Affiche les équipes d'un club
	 */
	public function equipesAction($id_club) {
		$em = $this->getDoctrine()->getManager();
		
		// Le club
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		// les équipes
		$listeEquipes = $em
			->getRepository('GTClubBundle:Equipe')
			->findBy(array('club' => $club));
		
		return $this->render('GTClubBundle:Equipe:equipes.html.twig', array(
            'club' => $club,
			'equipes' => $listeEquipes
        ));
	}
	
	/**
	 * Creer une équipe
	 */
	public function creerAction($id_club, Request $request) {
		$em = $this->getDoctrine()->getManager();
		
		// Le club
		$club = $em->getRepository('GTClubBundle:Club')->find($id_club);
		if (null === $club) {
		  throw new NotFoundHttpException("Le club d'id ".$id_club." n'existe pas.");
		}
		
		$equipe = new Equipe();
		$form = $this->get('form.factory')->create(EquipeType::class, $equipe);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			$equipe->setClub($club);
			$em->persist($equipe);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Equipe bien enregistrée.');

			return $this->redirectToRoute('gt_club_equipes', array('id_club' => $club->getId()));
		}

		return $this->render('GTClubBundle:Equipe:creer.html.twig', array(
			'club' => $club,
			'form' => $form->createView(),
		));
	}
	
	/**
	 * Modifier une équipe
	 */
	public function modifierAction($id_equipe, Request $request) {
		$em = $this->getDoctrine()->getManager();
		
		// l'équipe
		$equipe = $em->getRepository('GTClubBundle:Equipe')->find($id_equipe);
		if (null === $equipe) {
		  throw new NotFoundHttpException("L'équipe d'id ".$id_equipe." n'existe pas.");
		}
		
		$club = $equipe->getClub();
		
		$form = $this->get('form.factory')->create(EquipeMajType::class, $equipe);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			$em->persist($equipe);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Equipe bien enregistrée.');

			return $this->redirectToRoute('gt_club_equipes', array('id_club' => $club->getId()));
		}

		return $this->render('GTClubBundle:Equipe:modifier.html.twig', array(
			'equipe' => $equipe,
			'club' => $club,
			'form' => $form->createView(),
		));
	}
}
