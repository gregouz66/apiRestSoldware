<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageArticleRepository")
 */
class ImageArticle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5000)
     */
    private $link;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $par_defaut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="imagesArticle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    public function __toString() {
        return (string) $this->link;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParDefaut(): ?bool
    {
        return $this->par_defaut;
    }

    public function setParDefaut(?bool $par_defaut): self
    {
        $this->par_defaut = $par_defaut;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
