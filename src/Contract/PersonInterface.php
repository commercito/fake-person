<?php

namespace Reiterus\FakePerson\Contract;

interface PersonInterface extends PersonConstInterface
{
    /** ФИО */
    public function getFullName(): string;

    /** Пол */
    public function getGender(): string;

    /** День рождения */
    public function getBirthday(): string;

    /** Паспорт: номер и серия */
    public function getPassport(): string;

    /** Почтовый адрес */
    public function getAddress(): string|array;

    /** Электронная почта */
    public function getEmail(): string;

    /** Мобильный телефон */
    public function getPhone(): string;

    /** Профессия */
    public function getProfession(): string;

    /** Образование */
    public function getEducation(): string;

    /** ИНН */
    public function getInn(): string;

    /** СНИЛС */
    public function getPANumber(): string;
}
