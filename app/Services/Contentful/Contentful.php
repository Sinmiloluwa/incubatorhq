<?php

namespace App\Services\Contentful;

/**
 * @method static add(string $name, string $value)
 * @method static instrument()
 */
class Contentful
{
    protected static function process()
    {
        return new Config();
    }

    public static function __callStatic($method, $argument)
    {
        return self::process()->{$method}(...$argument);
    }
}
