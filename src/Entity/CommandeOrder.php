<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeOrderRepository")
 */
class CommandeOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commandeOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ModeLivraison", inversedBy="commandeOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modeLivraison;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FacturationOrder", inversedBy="commandeOrder", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $facturationOrder;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\LivraisonOrder", inversedBy="commandeOrder", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $livraisonOrder;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\IdentityOrder", inversedBy="commandeOrder", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $identityOrder;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PaymentOrder", inversedBy="commandeOrder", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $paymentOrder;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneArticle", mappedBy="commandeOrder")
     */
    private $lignesArticle;

    public function __construct()
    {
        $this->lignesArticle = new ArrayCollection();
    }

    public function __toString() {
        return (string) "#".$this->reference;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getModeLivraison(): ?ModeLivraison
    {
        return $this->modeLivraison;
    }

    public function setModeLivraison(?ModeLivraison $modeLivraison): self
    {
        $this->modeLivraison = $modeLivraison;

        return $this;
    }

    public function getFacturationOrder(): ?FacturationOrder
    {
        return $this->facturationOrder;
    }

    public function setFacturationOrder(FacturationOrder $facturationOrder): self
    {
        $this->facturationOrder = $facturationOrder;

        return $this;
    }

    public function getLivraisonOrder(): ?LivraisonOrder
    {
        return $this->livraisonOrder;
    }

    public function setLivraisonOrder(LivraisonOrder $livraisonOrder): self
    {
        $this->livraisonOrder = $livraisonOrder;

        return $this;
    }

    public function getIdentityOrder(): ?IdentityOrder
    {
        return $this->identityOrder;
    }

    public function setIdentityOrder(IdentityOrder $identityOrder): self
    {
        $this->identityOrder = $identityOrder;

        return $this;
    }

    public function getPaymentOrder(): ?PaymentOrder
    {
        return $this->paymentOrder;
    }

    public function setPaymentOrder(PaymentOrder $paymentOrder): self
    {
        $this->paymentOrder = $paymentOrder;

        return $this;
    }

    /**
     * @return Collection|LigneArticle[]
     */
    public function getLignesArticle(): Collection
    {
        return $this->lignesArticle;
    }

    public function addLignesArticle(LigneArticle $lignesArticle): self
    {
        if (!$this->lignesArticle->contains($lignesArticle)) {
            $this->lignesArticle[] = $lignesArticle;
            $lignesArticle->setCommandeOrder($this);
        }

        return $this;
    }

    public function removeLignesArticle(LigneArticle $lignesArticle): self
    {
        if ($this->lignesArticle->contains($lignesArticle)) {
            $this->lignesArticle->removeElement($lignesArticle);
            // set the owning side to null (unless already changed)
            if ($lignesArticle->getCommandeOrder() === $this) {
                $lignesArticle->setCommandeOrder(null);
            }
        }

        return $this;
    }
}
