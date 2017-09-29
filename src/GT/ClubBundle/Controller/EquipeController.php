<?php

namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GT\ClubBundle\Entity\Club;
use GT\ClubBundle\Form\ClubType;
use GT\ClubBundle\Entity\Equipe;
use GT\ClubBundle\Form\EquipeType;

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
		
		return $this->render('GTClubBundle:Equipe:equipes.html.twig', array(
            'club' => $club
        ));
	}
	
	/**
	 * Affiche les équipes d'un utilisateur
	 */
	public function userEquipesAction($id_user) {
		
	}
}
