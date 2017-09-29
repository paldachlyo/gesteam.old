<?php

namespace GT\ClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="GT\ClubBundle\Repository\ClubRepository")
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=255)
	 */
	private $email;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="telephone", type="string", length=255)
	 */
	private $telephone;
	
    /**
     * @var datetime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
	private $dateCreation;
	
    /**
     * @var datetime
     *
     * @ORM\Column(name="date_modification", type="date")
     */
	private $dateModification;

	/**
	 * @ORM\OneToMany(targetEntity="GT\ClubBundle\Entity\Equipe", mappedBy="club")
	 */
	private $equipes;
	
	public function __construct() {
		$this->dateCreation = new \DateTime();
		$this->equipes = new ArrayCollection();
		
		$this->dateModification = new \DateTime();
	}
	
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Club
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
	
	/**
	 * Récupère la liste des membres du club
	 * 
	 * @return array Club
	 */
	public function getMembre() {
		return array(new Club());
	}

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Club
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return Club
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Club
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Club
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Add equipe
     *
     * @param \GT\ClubBundle\Entity\Equipe $equipe
     *
     * @return Club
     */
    public function addEquipe(\GT\ClubBundle\Entity\Equipe $equipe)
    {
        $this->equipes[] = $equipe;
		$equipe->setClub($this);

        return $this;
    }

    /**
     * Remove equipe
     *
     * @param \GT\ClubBundle\Entity\Equipe $equipe
     */
    public function removeEquipe(\GT\ClubBundle\Entity\Equipe $equipe)
    {
        $this->equipes->removeElement($equipe);
    }

    /**
     * Get equipes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipes()
    {
        return $this->equipes;
    }
}
