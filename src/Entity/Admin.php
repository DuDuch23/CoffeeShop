<?php

namespace App\Entity;

class Admin
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $password;

    public function __construct(string $lastname, string $firstname, string $email, string $password) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}