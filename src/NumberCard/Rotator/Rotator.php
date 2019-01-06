<?php
namespace Ttskch\Nagoyaphp13\NumberCard\Rotator;

use Ttskch\Nagoyaphp13\NumberCard\Collection;
use Ttskch\Nagoyaphp13\NumberCard\NumberCard;

abstract class Rotator
{
    protected $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function rotate(int $coordinate)
    {
        $target_number_card_list = $this->getTargetList($coordinate);

        assert(count($target_number_card_list) === count(array_filter($target_number_card_list, function ($row) {
            return $row instanceof NumberCard;
        })));

        $number_card_list = array_reverse($target_number_card_list);
        $number_row       = end($number_card_list);

        foreach ($number_card_list as $row) {
            $this->collection->set(new NumberCard($number_row->getNumber(), $row->getX(), $row->getY()));
            $number_row = $row;
        }
    }

    abstract protected function getTargetList(int $coordinate): array;
}
