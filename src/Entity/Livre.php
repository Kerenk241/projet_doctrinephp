<?php
// src/entity/Livre.php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="livres")
 */
class Livre {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $genre;
    
    /**
     * @ORM\Column(type="float")
     */
    private $prix;
    
    /**
     * @ORM\ManyToOne(targetEntity="Auteur", inversedBy="livres")
     * @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     */
    private $auteur;
    
    // Getters and Setters
    public function getId() {
        return $this->id;
    }
    
    public function getTitre() {
        return $this->titre;
    }
    
    public function setTitre($titre) {
        $this->titre = $titre;
    }
    
    public function getGenre() {
        return $this->genre;
    }
    
    public function setGenre($genre) {
        $this->genre = $genre;
    }
    
    public function getPrix() {
        return $this->prix;
    }
    
    public function setPrix($prix) {
        $this->prix = $prix;
    }
    
    public function getAuteur() {
        return $this->auteur;
    }
    
    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }
}
?>
