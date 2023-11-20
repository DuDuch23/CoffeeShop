<?php

namespace App\Entity;

class Product
{
    private int $id;
    private string $name;
    private int $price;
    private int $note;
    private string $family;
    private string $country;

    public function __construct(string $name, int $price, int $note, string $family, string $country) {
        $this->name = $name;
        $this->price = $price;
        $this->note = $note;
        $this->family = $family;
        $this->country = $country;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function getFamily(): string
    {
        return $this->family;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}