<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeLivraisonRepository")
 */
class ModeLivraison
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandeOrder", mappedBy="modeLivraison")
     */
    private $commandeOrders;

    public function __construct()
    {
        $this->commandeOrders = new ArrayCollection();
        // your own logic
    }

    public function __toString() {
        return (string) $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|CommandeOrder []
     */
    // public function getCommandeOrders(): Collection
    // {
    //     return $this->commandeOrders;
    // }
    public function addCommandeOrder(CommandeOrder $commandeOrder): self
    {
        if (!$this->commandeOrders->contains($commandeOrder)) {
            $this->commandeOrders[] = $commandeOrder;
            $commandeOrder->setModeLivraison($this);
        }

        return $this;
    }
    public function removeCommandeOrder(CommandeOrder $commandeOrder): self
    {
        if ($this->commandeOrders->contains($commandeOrder)) {
            $this->commandeOrders->removeElement($commandeOrder);
            // set the owning side to null (unless already changed)
            if ($commandeOrder->getModeLivraison() === $this) {
                $commandeOrder->setModeLivraison(null);
            }
        }

        return $this;
    }
}
