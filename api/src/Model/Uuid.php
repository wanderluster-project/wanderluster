<?php

namespace App\Model;

class Uuid
{
    /**
     * @var string
     */
    protected $hexString;

    /**
     * @var int
     */
    protected $shard;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var int
     */
    protected $localId;

    const TYPE_ENTITY = 0;
    const TYPE_ENTITY_PROPERTY = 1;

    /**
     * Uuid constructor.
     * @param string $hexString
     * @param int $shard
     * @param int $type
     * @param int $localId
     */
    public function __construct(string $hexString,int $shard,int $type,int $localId)
    {
        $this->hexString = $hexString;
        $this->shard = $shard;
        $this->type = $type;
        $this->localId = $localId;
    }

    /**
     * @return string
     */
    public function getHexString():string
    {
        return $this->hexString;
    }

    /**
     * @return int
     */
    public function getShard():int
    {
        return $this->shard;
    }

    /**
     * @return int
     */
    public function getType():int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getLocalId():int
    {
        return $this->localId;
    }
}