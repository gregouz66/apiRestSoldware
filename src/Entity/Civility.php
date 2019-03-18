<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CivilityRepository")
 */
class Civility
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IdentityUser", mappedBy="civility")
     */
    private $identityUsers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IdentityOrder", mappedBy="civility")
     */
    private $identityOrders;

    public function __construct()
    {
        $this->identityUsers = new ArrayCollection();
        $this->identityOrders = new ArrayCollection();
    }

    public function __toString() {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|IdentityUser[]
     */
    public function getIdentityUsers(): Collection
    {
        return $this->identityUsers;
    }

    public function addIdentityUser(IdentityUser $identityUser): self
    {
        if (!$this->identityUsers->contains($identityUser)) {
            $this->identityUsers[] = $identityUser;
            $identityUser->setCivility($this);
        }

        return $this;
    }

    public function removeIdentityUser(IdentityUser $identityUser): self
    {
        if ($this->identityUsers->contains($identityUser)) {
            $this->identityUsers->removeElement($identityUser);
            // set the owning side to null (unless already changed)
            if ($identityUser->getCivility() === $this) {
                $identityUser->setCivility(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|IdentityOrder[]
     */
    public function getIdentityOrders(): Collection
    {
        return $this->IdentityOrders;
    }

    public function addIdentityOrder(IdentityOrder $IdentityOrder): self
    {
        if (!$this->IdentityOrders->contains($IdentityOrder)) {
            $this->IdentityOrders[] = $IdentityOrder;
            $IdentityOrder->setCivility($this);
        }

        return $this;
    }

    public function removeIdentityOrder(IdentityOrder $IdentityOrder): self
    {
        if ($this->IdentityOrders->contains($IdentityOrder)) {
            $this->IdentityOrders->removeElement($IdentityOrder);
            // set the owning side to null (unless already changed)
            if ($IdentityOrder->getCivility() === $this) {
                $IdentityOrder->setCivility(null);
            }
        }

        return $this;
    }
}
