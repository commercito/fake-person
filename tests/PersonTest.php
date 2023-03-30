<?php


use PHPUnit\Framework\TestCase;
use Reiterus\FakePerson\Person;

class PersonTest extends TestCase
{
    /**
     * @covers \Reiterus\FakePerson\Person::toArray
     * @return void
     */
    public function testToArray()
    {
        $person = new Person();
        $this->assertIsArray($person->toArray());
    }
}
