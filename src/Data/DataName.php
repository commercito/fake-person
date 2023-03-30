<?php

namespace Reiterus\FakePerson\Data;

class DataName
{
    public const SURNAME = [
        'Васин', 'Антипов', 'Огурцов',
        'Мосяков', 'Путин', 'Ниживенко',
        'Алябьев', 'Ильин', 'Герасимов',
        'Антипчук', 'Гагарин', 'Дегтярёв',
        'Иванов', 'Петров', 'Сидоров',
    ];

    /** @var string[] Мужское имя и начало отчества */
    public const NAME_MALE = [
        'Павел' => 'Павло', 'Семён' => 'Семёно',
        'Василий' => 'Василье', 'Виктор' => 'Викторо',
        'Александр' => 'Александро', 'Николай' => 'Николае',
        'Дмитрий' => 'Дмитрие', 'Иван' => 'Ивано',
        'Фёдор' => 'Фёдоро', 'Роман' => 'Романо',
    ];

    public const NAME_FEMALE = [
        'Наталья', 'Нина', 'Елена',
        'Надежда', 'Ирина', 'Анастасия',
        'Мария', 'Валентина', 'Полина',
        'Анна', 'Валентина', 'Екатерина',
        'Татьяна', 'Ольга', 'Евдокия',
    ];
}
