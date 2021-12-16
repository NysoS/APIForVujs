<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *  @Groups("get:article")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"get:article","get:cat"})
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     * @Groups({"get:article","get:cat"})
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get:article","get:cat"})
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"get:article","get:cat"})
     */
    private $isEnStock;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups({"get:article","get:cat"})
     */
    private $paysOrigin;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="articles")
     *  @Groups("get:article")
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsEnStock(): ?bool
    {
        return $this->isEnStock;
    }

    public function setIsEnStock(bool $isEnStock): self
    {
        $this->isEnStock = $isEnStock;

        return $this;
    }

    public function getPaysOrigin(): ?string
    {
        return $this->paysOrigin;
    }

    public function setPaysOrigin(string $paysOrigin): self
    {
        $this->paysOrigin = $paysOrigin;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
