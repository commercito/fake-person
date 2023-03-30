<?php


use PHPUnit\Framework\TestCase;
use Reiterus\FakePerson\Address;

class AddressTest extends TestCase
{
    /**
     * @covers \Reiterus\FakePerson\Address::toArray
     * @return void
     */
    public function testToArray(): void
    {
        $address = new Address();
        $this->assertIsArray($address->toArray());
    }
}
