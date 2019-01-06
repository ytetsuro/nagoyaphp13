<?php
namespace Ttskch\Nagoyaphp13;

use Ttskch\Nagoyaphp13\NumberCard\Rotator\Rotator;

class RotateAliasMapper
{
    private $map = [];

    public function setAlias(string $alias_name, Rotator $rotator, int $coordinate)
    {
        $this->map[$alias_name] = [$rotator, $coordinate];
    }

    public function runRotateByAlias(string $alias_name)
    {
        assert(array_key_exists($alias_name, $this->map));

        list($rotator, $coordinate) = $this->map[$alias_name];

        $rotator->rotate($coordinate);
    }
}
