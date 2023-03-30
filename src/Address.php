<?php

namespace Reiterus\FakePerson;

use Reiterus\FakePerson\Contract\Abstraction;
use Reiterus\FakePerson\Contract\AddressInterface;
use Reiterus\FakePerson\Data\DataAddress;

class Address extends Abstraction implements AddressInterface
{
    /**
     * @param array|null $cityIdx город и почтовый индекс
     */
    public function __construct(
        public readonly ?string $city = null,
        private ?array $cityIdx = null,
    ) {
        $this->cityIdx = $this->getCityIdx();
    }

    public function getIndex(): string
    {
        [,$index] = $this->cityIdx;

        return $index;
    }

    public function getCity(): string
    {
        [$city] = $this->cityIdx;

        return DataAddress::PREFIX_CITY.$city;
    }

    public function getStreet(): string
    {
        $streets = DataAddress::STREET;
        shuffle($streets);

        return current($streets);
    }

    public function getHouse(): string
    {
        return DataAddress::PREFIX_HOUSE.rand(1, 200);
    }

    public function getApartment(): string
    {
        return DataAddress::PREFIX_APARTMENT.rand(1, 200);
    }

    public function toArray(): array
    {
        if (!$this->unique) {
            $this->unique = [
                self::INDEX => $this->getIndex(),
                self::CITY => $this->getCity(),
                self::STREET => $this->getStreet(),
                self::HOUSE => $this->getHouse(),
                self::APARTMENT => $this->getApartment(),
            ];
        }

        return $this->unique;
    }

    private function getCityIdx(): array
    {
        if (!$this->cityIdx) {
            $city = $this->city;

            if (!$this->city) {
                $keys = array_keys(DataAddress::CITY);
                shuffle($keys);
                $city = current($keys);
            }

            $index = DataAddress::CITY[$city];
            $this->cityIdx = [$city, $index];
        }

        return $this->cityIdx;
    }
}
