<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="civility")
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

    public function __construct()
    {
    }

   /**
   * @return mixed
   */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
    * @return mixed
    */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
    * @return mixed $name
    */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
