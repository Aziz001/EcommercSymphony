<?php

namespace ShopBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class UserAdr
{
     /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
   
    /**
     * @MongoDB\Field(type="string")
     */
    private $user;
    
    
    /**
     * @MongoDB\Field(type="string")
     */

    private $nom;

    
    /**
     * @MongoDB\Field(type="string")
     */

    private $prenom;
     /**
     * @MongoDB\Field(type="string")
     */
    
    private $telephone;
/**
     * @MongoDB\Field(type="string")
     */
    
    private $adresse;

    /**
     * @MongoDB\Field(type="string")
     */
    
    private $cp;

/**
     * @MongoDB\Field(type="string")
     */
    
    private $email;

    /**
     * @MongoDB\Field(type="string")
     */
    
    private $pays;

    /**
     * @MongoDB\Field(type="string")
     */
    
    private $ville;

    /**
     * @MongoDB\Field(type="string")
     */
    
    private $notes;


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
     * @return UserAdr
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
     * @return UserAdr
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
     * Set telephone
     *
     * @param string $telephone
     * @return UserAdr
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
     * Set adresse
     *
     * @param string $adresse
     * @return UserAdr
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
     * Set email
     *
     * @param string $email
     * @return UserAdr
     */
    public function setEmail($adresse)
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
     * Set cp
     *
     * @param string $cp
     * @return UserAdr
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return UserAdr
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return UserAdr
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
     * Set complement
     *
     * @param string $notes
     * @return UserAdr
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Document\User $user
     * @return UserAdr
     */
    public function setUser(\AppBundle\Document\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user \AppBundle\Document\User
     *
     * @return 
     */
    public function getUser()
    {
        return $this->user;
    }
}