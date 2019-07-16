<?php

namespace App\Model;

class EntityManager
{
    /**
     * @param int $shard
     * @return int
     */
    public function generateLocalId(int $shard){
        return 1;
    }
}