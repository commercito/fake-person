<?php


use PHPUnit\Framework\TestCase;
use Reiterus\FakePerson\Fake;
use Reiterus\FakePerson\Contract\PersonInterface;
use Reiterus\FakePerson\Contract\AddressInterface;

class FakeTest extends TestCase
{
    /**
     * @covers \Reiterus\FakePerson\Fake::getPerson
     * @return void
     */
    public function testGetPerson(): void
    {
        $fake = new Fake();
        $person = $fake->getPerson();
        $this->assertInstanceOf(PersonInterface::class, $person);
    }

    /**
     * @covers \Reiterus\FakePerson\Fake::getAddress
     * @return void
     */
    public function testGetAddress(): void
    {
        $fake = new Fake();
        $address = $fake->getAddress();
        $this->assertInstanceOf(AddressInterface::class, $address);
    }
}
