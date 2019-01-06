<?php
namespace Ttskch\Nagoyaphp13\NumberCard;

use Ttskch\Nagoyaphp13\NumberCard\Collection;
use Ttskch\Nagoyaphp13\NumberCard\NumberCard;

class CollectionFactory
{
    public function createBySecondDimensionArray(array $list): Collection
    {
        $result = new Collection();

        foreach ($list as $y => $x_numbers) {
            foreach ($x_numbers as $x => $number) {
                $result->set(new NumberCard($number, $x, $y));
            }
        }

        return $result;
    }
}
