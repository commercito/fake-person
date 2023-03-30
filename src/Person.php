<?php

namespace Reiterus\FakePerson;

use Reiterus\FakePerson\Contract\Abstraction;
use Reiterus\FakePerson\Contract\PersonInterface;
use Reiterus\FakePerson\Data\DataName;
use Reiterus\FakePerson\Data\DataProfession;
use Reiterus\FakePerson\Enum\Domain;
use Reiterus\FakePerson\Enum\Education;
use Reiterus\FakePerson\Enum\Gender;
use Reiterus\FakePerson\Util\Helper;

class Person extends Abstraction implements PersonInterface
{
    public function __construct(
        public readonly bool $woman = false,
        public readonly int $age = 0,
        public readonly bool $inline = true,
        public readonly ?string $city = null,
        private ?string $fio = null
    ) {
        $this->fio = $this->getFIO();
    }

    public function getFullName(): string
    {
        return $this->fio;
    }

    public function getGender(): string
    {
        $case = $this->woman
            ? Gender::FEMALE
            : Gender::MALE;

        return $case->value;
    }

    public function getBirthday(): string
    {
        $yearMax = date('Y') - 18;
        $yearMin = date('Y') - 90;

        if ($this->age) {
            $yearMax = $yearMin = date('Y') - $this->age;
        }

        $min = strtotime("{$yearMin}-01-01");
        $max = strtotime("{$yearMax}-12-31");
        $timestamp = mt_rand($min, $max);

        return date('d.m.Y', $timestamp);
    }

    public function getPassport(): string
    {
        return sprintf(
            '%s %s',
            sprintf('%02d', rand(1000, 9999)),
            sprintf('%06d', rand(1, 999999)),
        );
    }

    public function getAddress(): string|array
    {
        $address = new Address(city: $this->city);

        return $this->inline
            ? $address->__toString()
            : $address->toArray();
    }

    public function getEmail(): string
    {
        $domain = $this->getCase(Domain::cases());
        $str = substr($this->fio, 0, strrpos($this->fio, ' '));
        $account = Helper::toEng($str);
        $account = str_replace(' ', '.', strtolower($account));

        return sprintf('%s@%s', $account, $domain);
    }

    public function getPhone(): string
    {
        return sprintf(
            '+7 %s %s-%s-%s',
            rand(900, 997),
            sprintf('%03d', rand(1, 999)),
            sprintf('%02d', rand(1, 99)),
            sprintf('%02d', rand(1, 99))
        );
    }

    public function getProfession(): string
    {
        $items = DataProfession::ITEMS;

        return $items[array_rand($items)];
    }

    public function getEducation(): string
    {
        return $this->getCase(Education::cases());
    }

    public function getInn(): string
    {
        $item = rand(100000000000, 999999999999);

        return substr_replace(strval($item), '000', rand(1, 9), 3);
    }

    public function getPANumber(): string
    {
        return sprintf(
            '%s-%s-%s %s',
            sprintf('%03d', rand(1, 999)),
            sprintf('%03d', rand(1, 999)),
            sprintf('%03d', rand(1, 999)),
            sprintf('%02d', rand(1, 99))
        );
    }

    public function toArray(): array
    {
        if (!$this->unique) {
            $this->unique = [
                self::FULL_NAME => $this->fio,
                self::GENDER => $this->getGender(),
                self::BIRTHDAY => $this->getBirthday(),
                self::PASSPORT => $this->getPassport(),
                self::ADDRESS => $this->getAddress(),
                self::EMAIL => $this->getEmail(),
                self::PHONE => $this->getPhone(),
                self::PROFESSION => $this->getProfession(),
                self::EDUCATION => $this->getEducation(),
                self::INN => $this->getInn(),
                self::PA_NUMBER => $this->getPANumber(),
            ];
        }

        return $this->unique;
    }

    private function getFIO(): string
    {
        $surnames = DataName::SURNAME;
        shuffle($surnames);
        $surname = current($surnames);

        $mNames = DataName::NAME_MALE;
        shuffle($mNames);
        $patronymic = current($mNames);

        $names = array_keys(DataName::NAME_MALE);
        $patronymic = $patronymic.'вич';

        if ($this->woman) {
            $names = DataName::NAME_FEMALE;
            $end = mb_substr($surname, -2, 2, 'utf8');
            $surname .= in_array($end, ['ин', 'ев', 'ов']) ? 'а' : '';
            $patronymic = str_replace('вич', 'вна', $patronymic);
        }

        shuffle($names);
        $name = current($names);

        return sprintf('%s %s %s', $surname, $name, $patronymic);
    }

    private function getCase(array $cases): string
    {
        shuffle($cases);

        return current($cases)->value;
    }
}
