<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $price;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private int $stock = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
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

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
        return $this;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;
        return $this;
    }
    #[ORM\Column(length: 100, unique: true)]
private string $slug;

#[ORM\Column(length: 50)]
private string $category;

#[ORM\Column(type: 'json', nullable: true)]
private ?array $nutrition = null;

#[ORM\Column(type: 'json', nullable: true)]
private ?array $customizable = null;
public function getSlug(): string
{
    return $this->slug;
}

public function setSlug(string $slug): static
{
    $this->slug = $slug;
    return $this;
}

public function getCategory(): string
{
    return $this->category;
}

public function setCategory(string $category): static
{
    $this->category = $category;
    return $this;
}

public function getNutrition(): ?array
{
    return $this->nutrition;
}

public function setNutrition(?array $nutrition): static
{
    $this->nutrition = $nutrition;
    return $this;
}

public function getCustomizable(): ?array
{
    return $this->customizable;
}

public function setCustomizable(?array $customizable): static
{
    $this->customizable = $customizable;
    return $this;
}
}