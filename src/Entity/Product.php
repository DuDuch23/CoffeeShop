<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[UniqueEntity(fields: ['name'], message: 'Ce nom est déjà utilisé.')]

class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Une description est obligatoire.')]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le prix est obligatoire.')]
    private ?float $price = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Une note est obligatoire.')]
    private ?float $note = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'La famille est obligatoire.')]
    private ?string $family = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le pays d\'origine est obligatoire.')]
    private ?string $country = null;

    #[ORM\Column(nullable: true)]
    private ?bool $best_seller = null;

    #[ORM\ManyToOne]
    #[Assert\NotBlank(message: 'La catégorie est obligatoire.')]
    private ?Category $category = null;

    #[ORM\ManyToOne]
    #[Assert\NotBlank(message: 'La marque est obligatoire.')]
    private ?Brand $brand = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): static
    {
        $this->family = $family;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function isBestSeller(): ?bool
    {
        return $this->best_seller;
    }

    public function setBestSeller(?bool $best_seller): static
    {
        $this->best_seller = $best_seller;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }
}
