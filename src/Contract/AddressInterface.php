<?php

namespace Reiterus\FakePerson\Contract;

interface AddressInterface
{
    public const INDEX = 'index';
    public const CITY = 'city';
    public const STREET = 'street';
    public const HOUSE = 'house';
    public const APARTMENT = 'apartment';

    /** Почтовый индекс */
    public function getIndex(): string;

    /** Город */
    public function getCity(): string;

    /** Улица */
    public function getStreet(): string;

    /** Дом */
    public function getHouse(): string;

    /** Квартира */
    public function getApartment(): string;
}
