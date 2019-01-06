<?php
namespace Ttskch\Nagoyaphp13\NumberCard\Rotator;

class XReverseRotator extends Rotator
{
    protected function getTargetList(int $coordinate): array
    {
        return array_reverse(array_filter($this->collection->getList(), function ($row) use ($coordinate) {
            return $row->getY() === $coordinate;
        }));
    }
}
