<?php

namespace Tests\Model;

use App\Model\Uuid;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use App\Exception\InvalidArgumentException;

class UuidTest extends TestCase
{
    public function testHexConversion()
    {
        $sut = new Uuid('0000-0000-00000000');
        $this->assertEquals(0, $sut->getType());
        $this->assertEquals(0, $sut->getShard());
        $this->assertEquals(0, $sut->getLocalId());

        $sut = new Uuid('7C64-35A0-4A0972DC');
        $this->assertEquals(31844, $sut->getType());
        $this->assertEquals(13728, $sut->getShard());
        $this->assertEquals(1242133212, $sut->getLocalId());
    }

    public function testInvalidHexString(){
        try{
            $sut = new Uuid('');
            $this->fail('Exception not thrown.');
        }catch(InvalidArgumentException $e){
            $this->assertEquals('Invalid format for Wanderluster UUID', $e->getMessage());
        }
    }

    public function testToString(){
        $sut = new Uuid('7C64-35A0-4A0972DC');
        $this->assertEquals('7c64-35a0-4a0972dc', (string)$sut);
    }


}