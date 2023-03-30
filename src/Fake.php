<?php

namespace Reiterus\FakePerson;

use Reiterus\FakePerson\Contract\AddressInterface;
use Reiterus\FakePerson\Contract\FakeInterface;
use Reiterus\FakePerson\Contract\PersonInterface;

class Fake implements FakeInterface
{
    /** Экземпляр Person */
    public function getPerson(
        bool $woman = false,
        int $age = 0,
        bool $inline = true,
        ?string $city = null,
        ?string $fio = null
    ): PersonInterface {
        return new Person(
            woman: $woman,
            age: $age,
            inline: $inline,
            city: $city,
            fio: $fio
        );
    }

    /** Экземпляр Address */
    public function getAddress(
        ?string $city = null,
        ?array $cityIdx = null,
    ): AddressInterface {
        return new Address(
            city: $city,
            cityIdx: $cityIdx
        );
    }
}
