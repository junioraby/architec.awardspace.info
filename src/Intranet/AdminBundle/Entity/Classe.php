<?php

namespace Intranet\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Intranet\AdminBundle\Entity\ClasseRepository")
 */
class Classe
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
      * @ORM\ManyToOne(targetEntity="Intranet\AdminBundle\Entity\Anneescolaire", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $anneescolaire;

    /**
      * @ORM\ManyToOne(targetEntity="Intranet\AdminBundle\Entity\Filiere", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $filiere;

    /**
      * @ORM\ManyToOne(targetEntity="Intranet\AdminBundle\Entity\Niveauinscription", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $niveau;

  /**
* @ORM\OneToMany(targetEntity="Intranet\AdminBundle\Entity\Classeetudiant",mappedBy="classe")
*/
private $etudiants;

/**
* @ORM\OneToMany(targetEntity="Intranet\AdminBundle\Entity\Planning",mappedBy="classe")
*/
private $plannings;


public function actuelle(){
    if($this->anneescolaire->getEncours())
        return true;
    return false;
}
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudiants = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Classe
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
     * Set description
     *
     * @param string $description
     * @return Classe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Classe
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set anneescolaire
     *
     * @param \Intranet\AdminBundle\Entity\Anneescolaire $anneescolaire
     * @return Classe
     */
    public function setAnneescolaire(\Intranet\AdminBundle\Entity\Anneescolaire $anneescolaire = null)
    {
        $this->anneescolaire = $anneescolaire;

        return $this;
    }

    /**
     * Get anneescolaire
     *
     * @return \Intranet\AdminBundle\Entity\Anneescolaire 
     */
    public function getAnneescolaire()
    {
        return $this->anneescolaire;
    }

    /**
     * Add etudiants
     *
     * @param \Intranet\AdminBundle\Entity\Classeetudiant $etudiants
     * @return Classe
     */
    public function addEtudiant(\Intranet\AdminBundle\Entity\Classeetudiant $etudiants)
    {
        $this->etudiants[] = $etudiants;

        return $this;
    }

    /**
     * Remove etudiants
     *
     * @param \Intranet\AdminBundle\Entity\Classeetudiant $etudiants
     */
    public function removeEtudiant(\Intranet\AdminBundle\Entity\Classeetudiant $etudiants)
    {
        $this->etudiants->removeElement($etudiants);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }

    /**
     * Add plannings
     *
     * @param \Intranet\AdminBundle\Entity\Planning $plannings
     * @return Classe
     */
    public function addPlanning(\Intranet\AdminBundle\Entity\Planning $plannings)
    {
        $this->plannings[] = $plannings;

        return $this;
    }

    /**
     * Remove plannings
     *
     * @param \Intranet\AdminBundle\Entity\Planning $plannings
     */
    public function removePlanning(\Intranet\AdminBundle\Entity\Planning $plannings)
    {
        $this->plannings->removeElement($plannings);
    }

    /**
     * Get plannings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlannings()
    {
        return $this->plannings;
    }

    /**
     * Set filiere
     *
     * @param \Intranet\AdminBundle\Entity\Filiere $filiere
     * @return Classe
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
     * Set niveau
     *
     * @param \Intranet\AdminBundle\Entity\Niveauinscription $niveau
     * @return Classe
     */
    public function setNiveau(\Intranet\AdminBundle\Entity\Niveauinscription $niveau = null)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \Intranet\AdminBundle\Entity\Niveauinscription 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
}
