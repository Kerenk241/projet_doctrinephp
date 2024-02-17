<?php
// src/entities/Auteur.php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="auteurs")
 */
class Auteur {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;
    
    /**
     * @ORM\OneToMany(targetEntity="Livre", mappedBy="auteur")
     */
    private $livres;

    public function __construct() {
        $this->livres = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }
}
?>
