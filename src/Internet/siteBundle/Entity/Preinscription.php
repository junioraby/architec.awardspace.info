<?php

namespace Internet\siteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preinscription
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Internet\siteBundle\Entity\PreinscriptionRepository")
 */
class Preinscription
{
    /**
     * @var integer
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255,nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="motivation", type="text")
     */
    private $motivation;

    /**
      * @ORM\ManyToOne(targetEntity="Intranet\AdminBundle\Entity\Niveauinscription", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $niveauinscription;

    /**
      * @ORM\ManyToOne(targetEntity="Intranet\AdminBundle\Entity\Niveauscolaire", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $niveauscolaire;

    /**
      * @ORM\ManyToOne(targetEntity="Intranet\AdminBundle\Entity\Filiere", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $filiere;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="traite", type="boolean")
     */
    private $traite;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Preinscription
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
     * @return Preinscription
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
     * Set email
     *
     * @param string $email
     * @return Preinscription
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
     * Set ville
     *
     * @param string $ville
     * @return Preinscription
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Preinscription
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
     * Set mobile
     *
     * @param string $mobile
     * @return Preinscription
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Preinscription
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set motivation
     *
     * @param string $motivation
     * @return Preinscription
     */
    public function setMotivation($motivation)
    {
        $this->motivation = $motivation;

        return $this;
    }

    /**
     * Get motivation
     *
     * @return string 
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * Set niveauinscription
     *
     * @param \Intranet\AdminBundle\Entity\Niveauinscription $niveauinscription
     * @return Preinscription
     */
    public function setNiveauinscription(\Intranet\AdminBundle\Entity\Niveauinscription $niveauinscription = null)
    {
        $this->niveauinscription = $niveauinscription;

        return $this;
    }

    /**
     * Get niveauinscription
     *
     * @return \Intranet\AdminBundle\Entity\Niveauinscription 
     */
    public function getNiveauinscription()
    {
        return $this->niveauinscription;
    }

    /**
     * Set niveauscolaire
     *
     * @param \Intranet\AdminBundle\Entity\Niveauscolaire $niveauscolaire
     * @return Preinscription
     */
    public function setNiveauscolaire(\Intranet\AdminBundle\Entity\Niveauscolaire $niveauscolaire = null)
    {
        $this->niveauscolaire = $niveauscolaire;

        return $this;
    }

    /**
     * Get niveauscolaire
     *
     * @return \Intranet\AdminBundle\Entity\Niveauscolaire 
     */
    public function getNiveauscolaire()
    {
        return $this->niveauscolaire;
    }

    /**
     * Set filiere
     *
     * @param \Intranet\AdminBundle\Entity\Filiere $filiere
     * @return Preinscription
     */
    public function setFiliere(\Intranet\AdminBundle\Entity\Filiere $filiere = null)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere
     *
     * @return \Intranet\AdminBundle\Entity\Filiere 
     */
    public function getFiliere()
    {
        return $this->filiere;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Preinscription
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set traite
     *
     * @param boolean $traite
     * @return Preinscription
     */
    public function setTraite($traite)
    {
        $this->traite = $traite;

        return $this;
    }

    /**
     * Get traite
     *
     * @return boolean 
     */
    public function getTraite()
    {
        return $this->traite;
    }
}
