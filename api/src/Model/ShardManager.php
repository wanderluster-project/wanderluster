<?php

namespace App\Model;

use PDO;

class ShardManager
{

//    public function

    /**
     * @return PDO
     */
    public function getAvailableShard():PDO{
        return 1;
    }
}