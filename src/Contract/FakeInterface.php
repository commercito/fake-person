<?php

namespace Reiterus\FakePerson\Contract;

interface FakeInterface
{
    /** Экземпляр Person */
    public function getPerson(
        bool $woman = false,
        int $age = 0,
        bool $inline = true,
        ?string $city = null,
        ?string $fio = null
    ): PersonInterface;

    /** Экземпляр Address */
    public function getAddress(
        ?string $city = null,
        ?array $cityIdx = null,
    ): AddressInterface;
}
