<?php


namespace ShopBundle\Document;


class Commandes
{
   /**
     * @MongoDB\Id(strategy="auto")
     */
    private $id;
    /**
     * @MongoDB\Field(type="string")
     */
    private $user;
     /**
     * @MongoDB\Field(type="int")
     */
    private $valider;
     /**
     * @MongoDB\Field(type="date")
     */
    private $date;
    /**
     * @MongoDB\Field(type="int" strategy="auto")
     */
    private $reference;
    /**
     * @MongoDB\Field(type="collection")
     */
    private $commande;

    public function getId()
    {
        return $this->id;
    }

    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }

    public function getValider()
    {
        return $this->valider;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }


    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setCommande($commande)
    {
        $this->commande = $commande;

        return $this;
    }

    public function getCommande()
    {
        return $this->commande;
    }

 /**
     * Set user
     *
     * @param \AppBundle\Document\User $user
     * @return Commandes
     */
    public function setUser(src\AppBundle\Document\User $user = null)
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