<?php

namespace Ttskch\Nagoyaphp13;

class Nagoyaphp13
{
    /**
     * @var Map
     */
    private $map;

    public function __construct()
    {
        $this->map = new Map();
    }

    public function run(string $input): string
    {
        $commands = str_split($input);

        foreach ($commands as $command) {
            $this->map->$command();
        }

        return (string)$this->map;
    }
}
