<?php

class Dog
{
    private $name;
    private $breed;
    private $age;

    public function __construct(string $name, string $breed, string $age)
    {
        $this->name = $name;
        $this->breed = $breed;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBreed(): string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge(string $age): void
    {
        $this->age = $age;
    }



}