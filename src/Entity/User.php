<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FacturationUser", mappedBy="user", cascade={"persist", "remove"})
     */
    private $facturationUser;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\LivraisonUser", mappedBy="user", cascade={"persist", "remove"})
     */
    private $livraisonUser;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\IdentityUser", mappedBy="user", cascade={"persist", "remove"})
     */
    private $identityUser;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandeOrder", mappedBy="user")
     */
    private $commandeOrders;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tokenConfirm;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneArticle", mappedBy="user", orphanRemoval=true)
     */
    private $cart;

    public function __construct()
    {
        parent::__construct();
        $this->commandeOrders = new ArrayCollection();
        $this->cart = new ArrayCollection();
        // your own logic
    }

     public function getFacturationUser(): ?FacturationUser
     {
         return $this->facturationUser;
     }

     public function setFacturationUser(?FacturationUser $facturationUser): self
     {
         $this->facturationUser = $facturationUser;

         // set (or unset) the owning side of the relation if necessary
         $newUser = $facturationUser === null ? null : $this;
         if ($newUser !== $facturationUser->getUser()) {
             $facturationUser->setUser($newUser);
         }

         return $this;
     }

     public function getLivraisonUser(): ?LivraisonUser
     {
         return $this->livraisonUser;
     }

     public function setLivraisonUser(?LivraisonUser $livraisonUser): self
     {
         $this->livraisonUser = $livraisonUser;

         // set (or unset) the owning side of the relation if necessary
         $newUser = $livraisonUser === null ? null : $this;
         if ($newUser !== $livraisonUser->getUser()) {
             $livraisonUser->setUser($newUser);
         }

         return $this;
     }

     public function getIdentityUser(): ?IdentityUser
     {
         return $this->identityUser;
     }

     public function setIdentityUser(?IdentityUser $identityUser): self
     {
         $this->identityUser = $identityUser;

         // set (or unset) the owning side of the relation if necessary
         $newUser = $identityUser === null ? null : $this;
         if ($newUser !== $identityUser->getUser()) {
             $identityUser->setUser($newUser);
         }

         return $this;
     }

     /**
      * @return Collection|CommandeOrder[]
      */
     public function getCommandeOrders(): Collection
     {
         return $this->commandeOrders;
     }

     public function addCommandeOrder(CommandeOrder $commandeOrder): self
     {
         if (!$this->commandeOrders->contains($commandeOrder)) {
             $this->commandeOrders[] = $commandeOrder;
             $commandeOrder->setUser($this);
         }

         return $this;
     }

     public function removeCommandeOrder(CommandeOrder $commandeOrder): self
     {
         if ($this->commandeOrders->contains($commandeOrder)) {
             $this->commandeOrders->removeElement($commandeOrder);
             // set the owning side to null (unless already changed)
             if ($commandeOrder->getUser() === $this) {
                 $commandeOrder->setUser(null);
             }
         }

         return $this;
     }

     public function getTokenConfirm(): ?string
     {
         return $this->tokenConfirm;
     }

     public function setTokenConfirm(?string $tokenConfirm): self
     {
         $this->tokenConfirm = $tokenConfirm;

         return $this;
     }

     /**
      * @return Collection|LigneArticle[]
      */
     public function getCart(): Collection
     {
         return $this->cart;
     }

     public function addCart(LigneArticle $cart): self
     {
         if (!$this->cart->contains($cart)) {
             $this->cart[] = $cart;
             $cart->setUser($this);
         }

         return $this;
     }

     public function removeCart(LigneArticle $cart): self
     {
         if ($this->cart->contains($cart)) {
             $this->cart->removeElement($cart);
             // set the owning side to null (unless already changed)
             if ($cart->getUser() === $this) {
                 $cart->setUser(null);
             }
         }

         return $this;
     }
}