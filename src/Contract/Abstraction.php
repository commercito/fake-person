<?php

namespace Reiterus\FakePerson\Contract;

abstract class Abstraction implements \Stringable
{
    protected ?array $unique = null;

    abstract public function toArray(): array;

    public function toJson(bool $pretty = false): string
    {
        return $pretty
            ? json_encode($this->toArray(), 128 | 256)
            : json_encode($this->toArray(), 256);
    }

    public function __toString(): string
    {
        $values = array_values($this->toArray());

        return trim(implode(', ', $values));
    }
}
