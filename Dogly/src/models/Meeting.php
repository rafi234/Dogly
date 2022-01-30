<?php

class Meeting
{
    private $place;
    private $date;
    private $description;
    private $file;
    private $going;
    private $interested;
    private $id;

    public function __construct(string $place, $date, string $description, string $file, $going = 0, $interested = 0, $id = null)
    {
        $this->place = $place;
        $this->date = $date;
        $this->description = $description;
        $this->file = $file;
        $this->going = $going;
        $this->interested = $interested;
        $this->id = $id;
    }

    public function getGoing()
    {
        return $this->going;
    }


    public function setGoing($going): void
    {
        $this->going = $going;
    }


    public function getInterested()
    {
        return $this->interested;
    }

    public function setInterested($interested): void
    {
        $this->interested = $interested;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
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

    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile($file): void
    {
        $this->file = $file;
    }
}