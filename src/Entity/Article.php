<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $promo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $limited;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $compatibility;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ImageArticle", mappedBy="article", orphanRemoval=true)
     */
    private $imagesArticle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneArticle", mappedBy="article", orphanRemoval=true)
     */
    private $lignesArticle;

    public function __construct()
    {
        $this->imagesArticle = new ArrayCollection();
        $this->lignesArticle = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPromo(): ?int
    {
        return $this->promo;
    }

    public function setPromo(?int $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getLimited(): ?bool
    {
        return $this->limited;
    }

    public function setLimited(?bool $limited): self
    {
        $this->limited = $limited;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getCompatibility(): ?string
    {
        return $this->compatibility;
    }

    public function setCompatibility(string $compatibility): self
    {
        $this->compatibility = $compatibility;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection|ImageArticle[]
     */
    public function getImagesArticle(): Collection
    {
        return $this->imagesArticle;
    }

    public function addImagesArticle(ImageArticle $imagesArticle): self
    {
        if (!$this->imagesArticle->contains($imagesArticle)) {
            $this->imagesArticle[] = $imagesArticle;
            $imagesArticle->setArticle($this);
        }

        return $this;
    }

    public function removeImagesArticle(ImageArticle $imagesArticle): self
    {
        if ($this->imagesArticle->contains($imagesArticle)) {
            $this->imagesArticle->removeElement($imagesArticle);
            // set the owning side to null (unless already changed)
            if ($imagesArticle->getArticle() === $this) {
                $imagesArticle->setArticle(null);
            }
        }

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
             $lignesArticle->setArticle($this);
         }

         return $this;
     }

     public function removeLignesArticle(LigneArticle $lignesArticle): self
     {
         if ($this->lignesArticle->contains($lignesArticle)) {
             $this->lignesArticle->removeElement($lignesArticle);
             // set the owning side to null (unless already changed)
             if ($lignesArticle->getArticle() === $this) {
                 $lignesArticle->setArticle(null);
             }
         }

         return $this;
     }
}
