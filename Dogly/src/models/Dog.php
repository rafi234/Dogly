<?php

class Dog
{
    private $id_user;
    private $name;
    private $age;
    private $breed;


    public function __construct(int $id_user, string $name, string $age, string $breed = 'kundel')
    {
        $this->id_user = $id_user;
        $this->name = $name;
        $this->age = $age;
        $this->breed = $breed;
    }

    public function getId(): int
    {
        return $this->id_user;
    }

    public function setId(int $id): void
    {
        $this->id_user = $id;
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