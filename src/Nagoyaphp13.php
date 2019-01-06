<?php

namespace Ttskch\Nagoyaphp13;

use Ttskch\Nagoyaphp13\NumberCard\Rotator\XRotator;
use Ttskch\Nagoyaphp13\NumberCard\Rotator\YRotator;
use Ttskch\Nagoyaphp13\NumberCard\Rotator\XReverseRotator;
use Ttskch\Nagoyaphp13\NumberCard\Rotator\YReverseRotator;
use Ttskch\Nagoyaphp13\NumberCard\Collection;
use Ttskch\Nagoyaphp13\NumberCard\CollectionFactory;

class Nagoyaphp13
{
    private $factory;
    private $mapper;
    private $converter;

    public function __construct()
    {
        $this->factory = new CollectionFactory();
        $this->mapper = new RotateAliasMapper();
        $this->converter = new NumberCardCollectionConverter();
    }

    public function run(string $input): string
    {
        $collection = $this->factory->createBySecondDimensionArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ]);

        $this->setCommandMap($collection);

        $alias_list = $this->parseAlias($input);

        foreach ($alias_list as $alias) {
            $this->mapper->runRotateByAlias($alias);
        }

        return $this->converter->convert($collection);
    }

    private function parseAlias($input)
    {
        return str_split($input);
    }

    private function setCommandMap(Collection $collection)
    {
        $x_rotate = new XRotator($collection);
        $y_rotate = new YRotator($collection);
        $x_reverse_rotate = new XReverseRotator($collection);
        $y_reverse_rotate = new YReverseRotator($collection);

        $this->mapper->setAlias('a', $x_rotate, 0);
        $this->mapper->setAlias('b', $x_rotate, 1);
        $this->mapper->setAlias('c', $x_rotate, 2);
        $this->mapper->setAlias('d', $y_reverse_rotate, 0);
        $this->mapper->setAlias('e', $y_reverse_rotate, 1);
        $this->mapper->setAlias('f', $y_reverse_rotate, 2);
        $this->mapper->setAlias('g', $x_reverse_rotate, 2);
        $this->mapper->setAlias('h', $x_reverse_rotate, 1);
        $this->mapper->setAlias('i', $x_reverse_rotate, 0);
        $this->mapper->setAlias('j', $y_rotate, 2);
        $this->mapper->setAlias('k', $y_rotate, 1);
        $this->mapper->setAlias('l', $y_rotate, 0);
    }
}
