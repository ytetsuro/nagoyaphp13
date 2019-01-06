<?php
namespace Ttskch\Nagoyaphp13\NumberCard\Rotator;

class YRotator extends Rotator
{
    protected function getTargetList(int $coordinate): array
    {
        return array_values(array_filter($this->collection->getList(), function ($row) use ($coordinate) {
            return $row->getX() === $coordinate;
        }));
    }
}
