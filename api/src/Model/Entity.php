<?php

namespace App\Model;

class Entity
{
    /**
     * @var Uuid
     */
    protected $uuid;

    /**
     * Entity constructor.
     * @param Uuid $uuid
     */
    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }
}