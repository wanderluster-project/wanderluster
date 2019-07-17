<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 7/16/19
 * Time: 11:19 PM
 */

namespace App\Exception;


class ExceptionCodes
{
    const INVALID_UUID = 0;     // thrown when the UUID is not the correct format
    const NOT_64BIT = 1;        // thrown if PHP is compiled in 32 bit integers
}