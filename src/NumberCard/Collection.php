<?php
namespace Ttskch\Nagoyaphp13\NumberCard;

use Ttskch\Nagoyaphp13\NumberCard\NumberCard;

class Collection
{
    private $collection = [];

    public function set(NumberCard ...$number_cards)
    {
        foreach ($number_cards as $number_card) {
            $this->collection[$this->getSetIndex($number_card)] = $number_card;
        }

        usort($this->collection, function ($before, $after) {
            if ($before->getY() === $after->getY()) {
                return $before->getX() <=> $after->getX();
            }

            return $before->getY() <=> $after->getY();
        });
    }

    private function getSetIndex(NumberCard $number_card): int
    {
        foreach ($this->collection as $index => $row) {
            if ($row->isMatchPosition($number_card)) {
                return $index;
            }
        }

        return count($this->collection);
    }

    public function getList(): array
    {
        return array_values($this->collection);
    }

    public function groupByX()
    {
        $result = [];

        foreach ($this->collection as $row) {
            $result[$row->getX()]   = $result[$row->getX()] ?? [];
            $result[$row->getX()][] = $row;
        }

        return array_values($result);
    }

    public function groupByY()
    {
        $result = [];

        foreach ($this->collection as $row) {
            $result[$row->getY()]   = $result[$row->getY()] ?? [];
            $result[$row->getY()][] = $row;
        }

        return array_values($result);
    }
}
