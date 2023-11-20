<?php

namespace App\Entity;

class Slider
{
    private int $id;
    private string $title;
    private string $content;
    private string $buttonLink;
    private string $buttonText;
    private string $message;

    public function __construct(string $title, string $content, string $buttonLink, string $buttonText, string $message) {
        $this->title = $title;
        $this->content = $content;
        $this->buttonLink = $buttonLink;
        $this->buttonText = $buttonText;
        $this->message = $message;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getButtonLink(): string
    {
        return $this->buttonLink;
    }

    public function getButtonText(): string
    {
        return $this->buttonText;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}