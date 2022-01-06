<?php


class LongTermCare {
    private $timeStart;
    private $timeEnd;
    private $price;
    private $active;

    public function __construct($timeStart, $timeEnd,float $price, bool $active)
    {
        $this->timeStart = $timeStart;
        $this->timeEnd = $timeEnd;
        $this->price = $price;
        $this->active = $active;
    }

    public function getTimeStart()
    {
        return $this->timeStart;
    }

    public function setTimeStart($timeStart): void
    {
        $this->timeStart = $timeStart;
    }

    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    public function setTimeEnd($timeEnd): void
    {
        $this->timeEnd = $timeEnd;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive($active): void
    {
        $this->active = $active;
    }



}