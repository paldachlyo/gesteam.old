<?php

namespace GT\ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity(repositoryClass="GT\ClubBundle\Repository\MembreRepository")
 */
class Membre
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="emailParent1", type="string", length=255, nullable=true)
     */
    private $emailParent1;

    /**
     * @var string
     *
     * @ORM\Column(name="emailParent2", type="string", length=255, nullable=true)
     */
    private $emailParent2;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="float", nullable=true)
     */
    private $taille;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float", nullable=true)
     */
    private $poids;

	/**
	 * @ORM\ManyToOne(targetEntity="GT\ClubBundle\Entity\Club")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $club;
	
	/**
	 * @ORM\ManyToMany(targetEntity="GT\ClubBundle\Entity\Equipe", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=true)
	 */
	private $equipe;
	
	public function __construct() {
		
		$this->equipes = new ArrayCollection();
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
     * @return Membre
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Membre
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Membre
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
     * Set emailParent1
     *
     * @param string $emailParent1
     *
     * @return Membre
     */
    public function setEmailParent1($emailParent1)
    {
        $this->emailParent1 = $emailParent1;

        return $this;
    }

    /**
     * Get emailParent1
     *
     * @return string
     */
    public function getEmailParent1()
    {
        return $this->emailParent1;
    }

    /**
     * Set emailParent2
     *
     * @param string $emailParent2
     *
     * @return Membre
     */
    public function setEmailParent2($emailParent2)
    {
        $this->emailParent2 = $emailParent2;

        return $this;
    }

    /**
     * Get emailParent2
     *
     * @return string
     */
    public function getEmailParent2()
    {
        return $this->emailParent2;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Membre
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Membre
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
     * Set taille
     *
     * @param string $taille
     *
     * @return Membre
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set poids
     *
     * @param float $poids
     *
     * @return Membre
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float
     */
    public function getPoids()
    {
        return $this->poids;
    }
	
	/**
	 * Set club
	 *
	 * @return Club
	 */
	public function setClub(Club $club) {
		$this->club = $club;
		
		return $this;
	}
	
	/**
	 * Get club
	 *
	 * @return Club
	 */
	public function getClub() {
		return $this->club;
	}	
	
	public function addEquipe(Equipe $equipe) {
		$this->equipes[] = $equipe;
	}
	
	public function removeEquipe(Equipe $equipe) {
		$this->equipes->removeElement($equipe);
	}
	
	public function getEquipes() {
		return $this->equipes;
	}
}

