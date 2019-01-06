<?php

namespace Ttskch\Nagoyaphp13\NumberCard;

class NumberCard
{
    private $number;
    private $x;
    private $y;

    public function __construct(int $number, int $x, int $y)
    {
        $this->number = $number;
        $this->x      = $x;
        $this->y      = $y;
    }

    public function isMatchPosition(NumberCard $number_card): bool
    {
        return $number_card->getX() === $this->x && $number_card->getY() === $this->y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getNumber(): int
    {
        return $this->number;
    }
}
