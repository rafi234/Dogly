<?php

class Meeting
{
    private $place;
    private $date;
    private $description;

    public function __construct(string $place, $date, string $description)
    {
        $this->place = $place;
        $this->date = $date;
        $this->description = $description;
    }

    public function getPlace(): string
    {
        return $this->place;
    }

    public function setPlace($place): void
    {
        $this->place = $place;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }
}