<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturationOrderRepository")
 */
class FacturationOrder
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
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etatRegion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CommandeOrder", mappedBy="facturationOrder", cascade={"persist", "remove"})
     */
    private $commandeOrder;

    public function __toString() {
        return (string) "Voir l'adresse de facturation";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complementAdresse;
    }

    public function setComplementAdresse(?string $complementAdresse): self
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getEtatRegion(): ?string
    {
        return $this->etatRegion;
    }

    public function setEtatRegion(?string $etatRegion): self
    {
        $this->etatRegion = $etatRegion;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getCommandeOrder(): ?CommandeOrder
    {
        return $this->commandeOrder;
    }

    public function setCommandeOrder(CommandeOrder $commandeOrder): self
    {
        $this->commandeOrder = $commandeOrder;

        // set the owning side of the relation if necessary
        if ($this !== $commandeOrder->getFacturationOrder()) {
            $commandeOrder->setFacturationOrder($this);
        }

        return $this;
    }
}
