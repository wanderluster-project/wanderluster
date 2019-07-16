<?php

declare(strict_types=1);

namespace App\Model;

class UuidGenerator
{
    /**
     * @var ShardManager
     */
    protected $shardManager;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * UuidGenerator constructor.
     * @param ShardManager $shardManager
     * @param EntityManager $entityManager
     */
    public function __construct(ShardManager $shardManager, EntityManager $entityManager)
    {
        $this->shardManager = $shardManager;
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $type
     * @return Uuid
     */
    public function generate(int $type): Uuid
    {
        $shard = $this->shardManager->getAvailableShardForInsert();
        $localId = $this->entityManager->generateLocalId($shard);
        $hexString = $this->getHexString($shard, $type, $localId);
        return new Uuid($hexString, $shard, $type, $localId);
    }


    /**
     * @param string $hexString
     * @return Uuid
     */
    public function fromHexString(string $hexString): Uuid
    {
        return new Uuid(
            $hexString,
            $this->getShardFromHexString($hexString),
            $this->getTypeFromHexString($hexString),
            $this->getLocalIdFromHexString($hexString));
    }

    /**
     * @param string $hexString
     * @return int
     */
    public function getShardFromHexString(string $hexString): int
    {
        return 1;
    }

    /**
     * @param string $hexString
     * @return int
     */
    public function getTypeFromHexString(string $hexString): int
    {
        return 1;
    }

    /**
     * @param string $hexString
     * @return int
     */
    public function getLocalIdFromHexString(string $hexString): int
    {
        return 1;
    }

    /**
     * @param int $shard
     * @param int $type
     * @param int $localId
     * @return string
     */
    public function getHexString(int $shard, int $type, int $localId): string
    {
        return '4a1cd336-eb6e-4f45-9fec-71bbdbadc758';
    }
}