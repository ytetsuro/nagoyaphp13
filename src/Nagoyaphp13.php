<?php

namespace Ttskch\Nagoyaphp13;

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
        // please implement me.
        return '123/456/789';
    }
}
