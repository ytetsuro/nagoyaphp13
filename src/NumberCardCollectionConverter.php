<?php
namespace Ttskch\Nagoyaphp13;

use Ttskch\Nagoyaphp13\NumberCard\Collection;

class NumberCardCollectionConverter
{
    public function convert(Collection $collection): string
    {
        return implode('/', array_map(function ($row) {
            return $this->convertRow($row);
        }, $collection->groupByY()));
    }

    private function convertRow($row): string
    {
        return implode('', array_map(function ($column) {
            return $column->getNumber();
        }, $row));
    }
}
