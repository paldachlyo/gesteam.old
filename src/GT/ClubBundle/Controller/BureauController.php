<?php
namespace GT\ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GT\ClubBundle\Entity\Club;

class BureauController extends Controller
{
    public function indexAction() {
		$club = new Club();
		
        return $this->render('GTClubBundle:Default:index.html.twig', array(
            'pagename' => 'GTClubBundle:Default:index',
			'club' => $club
        ));
    }
}
