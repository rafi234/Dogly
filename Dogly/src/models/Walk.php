<?php

class Walk
{
    private $id_dog;
    private $name;
    private $age;
    private $date;
    private $price;
    private $image;

    public function __construct(int $id_dog, string $name, string $age, $date, float $price, string $image)
    {
        $this->id_dog = $id_dog;
        $this->name = $name;
        $this->age = $age;
        $this->date = $date;
        $this->price = $price;
        $this->image = $image;
    }

    public function getIdDog(): int
    {
        return $this->id_dog;
    }

    public function setIdDog(int $id_dog): void
    {
        $this->id_dog = $id_dog;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge(string $age): void
    {
        $this->age = $age;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }
}