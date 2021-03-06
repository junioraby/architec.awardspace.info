<?php

namespace Intranet\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professeur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Intranet\AdminBundle\Entity\ProfesseurRepository")
 */
class Professeur
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
     * @var \DateTime
     *
     * @ORM\Column(name="datenaissance", type="date")
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
/**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255,unique=true)
     */
    private $matricule;
    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=50)
     */
    private $genre;
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text")
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
      * @ORM\OneToOne(targetEntity="OC\UserBundle\Entity\User", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $compte;



    /**
      * @ORM\ManyToOne(targetEntity="Intranet\AdminBundle\Entity\Anneescolaire", cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
    private $anneescolaire;

    /**
* @ORM\OneToMany(targetEntity="Intranet\AdminBundle\Entity\Seance",mappedBy="professeur")
*/
private $plannings;

/**
* @ORM\OneToMany(targetEntity="Intranet\AdminBundle\Entity\Profmat",mappedBy="professeur")
*/
private $matieres;

    public function __construct()
  {
    $this->date = new \Datetime();
    $this->datenaissance = new \Datetime("1970-01-01");

  }

  public function enseigneMatiere(\Intranet\AdminBundle\Entity\Matiere $mat){
    foreach ($this->matieres as $key => $profmat) {
       if($profmat->getMatiere()->getId() == $mat->getId()) return true;
    }
    return false;
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
     * @return Professeur
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
     * @return Professeur
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
     * Set datenaissance
     *
     * @param string $datenaissance
     * @return Professeur
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return string 
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Professeur
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
     * Set matricule
     *
     * @param string $matricule
     * @return Professeur
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Professeur
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
     * Set compte
     *
     * @param \OC\UserBundle\Entity\User $compte
     * @return Professeur
     */
    public function setCompte(\OC\UserBundle\Entity\User $compte = null)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return \OC\UserBundle\Entity\User 
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set anneescolaire
     *
     * @param \Intranet\AdminBundle\Entity\Anneescolaire $anneescolaire
     * @return Professeur
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
     * Set date
     *
     * @param \DateTime $date
     * @return Professeur
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
     * Add plannings
     *
     * @param \Intranet\AdminBundle\Entity\Seance $plannings
     * @return Professeur
     */
    public function addPlanning(\Intranet\AdminBundle\Entity\Seance $plannings)
    {
        $this->plannings[] = $plannings;

        return $this;
    }

    /**
     * Remove plannings
     *
     * @param \Intranet\AdminBundle\Entity\Seance $plannings
     */
    public function removePlanning(\Intranet\AdminBundle\Entity\Seance $plannings)
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
     * Set adresse
     *
     * @param string $adresse
     * @return Professeur
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
     * Add matieres
     *
     * @param \Intranet\AdminBundle\Entity\Profmat $matieres
     * @return Professeur
     */
    public function addMatiere(\Intranet\AdminBundle\Entity\Profmat $matieres)
    {
        $this->matieres[] = $matieres;

        return $this;
    }

    /**
     * Remove matieres
     *
     * @param \Intranet\AdminBundle\Entity\Profmat $matieres
     */
    public function removeMatiere(\Intranet\AdminBundle\Entity\Profmat $matieres)
    {
        $this->matieres->removeElement($matieres);
    }

    /**
     * Get matieres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Professeur
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }
}
