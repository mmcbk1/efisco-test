<?php

namespace App\Helper;

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Boolean;

class Generator
{
    const PREFIX = 'CustomGenerator';

    private static $availableChars = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        1,
        2,
        3,
        4,
        5,
        6
    ];

    public static function generate(string $value): string
    {
        shuffle(self::$availableChars);
        $randomString = implode('', self::$availableChars);
        $hash = md5(Carbon::now()->getTimestamp() . $randomString . $value);

        session()->flash(self::getValue($hash), $value);

        return $hash;
    }

    public static function getRealValue(string $hash): string
    {
        $value = self::getValue($hash);
        if (session()->exists($value)) {
            return session()->get($value);
        }

        return '';
    }

    private static function getValue(string $value): string
    {
        return self::PREFIX . $value;
    }

    public static function hasValue(string $value)
    {
        return session()->has(self::PREFIX . $value);
    }
}
