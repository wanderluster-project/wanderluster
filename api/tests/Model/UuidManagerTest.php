<?php

namespace Tests\Model;

use App\Model\EntityManager;
use App\Model\ShardManager;
use App\Model\UuidManager;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Mockery;

class UuidManagerTest extends TestCase
{

    public function testHexString2Parts(){
        $mockShardManager = Mockery::mock(ShardManager::class);
        $mockEntityManager = Mockery::mock(EntityManager::class);
        $sut = new UuidManager($mockShardManager, $mockEntityManager);
        var_dump($sut->hexString2Parts('6e363ee9-0d23-4f22-a6d6-ec8792d04922'));
    }

}