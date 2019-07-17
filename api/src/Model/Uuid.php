<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\ExceptionCodes;
use App\Exception\InvalidArgumentException;
use App\Exception\RuntimeException;

/**
 * UUIDs generated in Wanderluster are a 64 bit Integer.
 * They are encoded using hexadecimals and have the format: {TYPE}-{SHARD}-{LOCAL-ID}
 * Type is 2 hexdigits (16 bits)
 * Shard is 2 hexdigits (16 bits)
 * LocalID is 4 hexdigits (32 bits)
 */
class Uuid
{
    static $checkedIs64Bit = false;

    /**
     * @var string
     */
    protected $hexString;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var int
     */
    protected $shard;

    /**
     * @var int
     */
    protected $localId;

    /**
     * Uuid constructor.
     * @param string $hexString
     */
    public function __construct(string $hexString)
    {
        if (!self::$checkedIs64Bit) {
            if (PHP_INT_SIZE !== 8) {
                throw new RuntimeException('Unable initialize UUID on 32 bit system.', ExceptionCodes::NOT_64BIT);
            }
            self::$checkedIs64Bit = true;
        }

        $hexString = strtolower($hexString);
        if (!preg_match('/^([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{8})$/', $hexString, $matches)) {
            throw new InvalidArgumentException('Invalid format for Wanderluster UUID', ExceptionCodes::INVALID_UUID);
        }

        $hexType = $matches[1];
        $hexShard = $matches[2];
        $hexLocalId = $matches[3];

        $this->hexString = $hexString;
        $this->type = hexdec($hexType);
        $this->shard = hexdec($hexShard);
        $this->localId = hexdec($hexLocalId);
    }

    /**
     * @return string
     */
    public function getHexString(): string
    {
        return $this->hexString;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getShard(): int
    {
        return $this->shard;
    }

    /**
     * @return int
     */
    public function getLocalId(): int
    {
        return $this->localId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getHexString();
    }
}