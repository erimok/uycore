<?php


namespace UYCore\Facades;


use UYCore\ThemeSupport\ThemeSupportService;

final class ThemeSupport
{
    private static ThemeSupportService $support;

    public static function getInstance(): ThemeSupportService
    {
        if (!isset(self::$support)) {
            self::setSupport();
        }

        return self::$support;
    }

    public static function setSupport(): void
    {
        self::$support = new ThemeSupportService();
    }
}