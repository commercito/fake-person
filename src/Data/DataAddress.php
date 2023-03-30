<?php

namespace Reiterus\FakePerson\Data;

class DataAddress
{
    public const PREFIX_CITY = 'г. ';
    public const PREFIX_HOUSE = 'д. ';
    public const PREFIX_APARTMENT = 'кв. ';
    public const STREET = [
        'ул. Лаврентьева', 'б-р Гагарина', 'ул. Солнечная',
        'пр-т Пацаева', 'пр-д Арктический', 'ул. Морская',
        'ул. 1812 года', 'пл. Бородинская', 'ул. Куликово поле',
    ];

    public const CITY = [
        'Москва' => '101000', 'Санкт-Петербург' => '190000', 'Воронеж' => '394000',
        'Рязань' => '390000', 'Белгород' => '308000', 'Владимир' => '600000',
        'Орёл' => '302000', 'Курск' => '305000', 'Тамбов' => '392000',
    ];
}
