<?php

namespace Ttskch\Nagoyaphp13;

class Map
{
    private $cells = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
    ];

    public function a()
    {
        $this->rotate(1, 2, 3);
    }

    public function b()
    {
        $this->rotate(4, 5, 6);
    }

    public function c()
    {
        $this->rotate(7, 8, 9);
    }

    public function d()
    {
        $this->rotate(7, 4, 1);
    }

    public function e()
    {
        $this->rotate(8, 5, 2);
    }

    public function f()
    {
        $this->rotate(9, 6, 3);
    }

    public function g()
    {
        $this->rotate(9, 8, 7);
    }

    public function h()
    {
        $this->rotate(6, 5, 4);
    }

    public function i()
    {
        $this->rotate(3, 2, 1);
    }

    public function j()
    {
        $this->rotate(3, 6, 9);
    }

    public function k()
    {
        $this->rotate(2, 5, 8);
    }

    public function l()
    {
        $this->rotate(1, 4, 7);
    }

    public function __toString(): string
    {
        return sprintf('%d%d%d/%d%d%d/%d%d%d', $this->cells[1], $this->cells[2], $this->cells[3], $this->cells[4], $this->cells[5], $this->cells[6], $this->cells[7], $this->cells[8], $this->cells[9]);
    }

    private function rotate(int $index1, int $index2, int $index3)
    {
        $buf = $this->cells[$index1];
        $this->cells[$index1] = $this->cells[$index2];
        $this->cells[$index2] = $this->cells[$index3];
        $this->cells[$index3] = $buf;
    }
}
