<?php

namespace App\Entity;

class Contact
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $email;
    private int $phone;
    private string $message;

    public function __construct(string $lastname, string $firstname, string $email, int $phone, string $message) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
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

    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getMessage(): string
    {
        return $this->message;
    }
}