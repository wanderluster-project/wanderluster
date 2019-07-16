<?php

namespace App\Model;

class ShardManager
{
    /**
     * @return int
     */
    public function getAvailableShardForInsert():int{
        return 1;
    }
}