<?php

namespace UYCore\Facades;

use UYCore\Security\SecurityService;

final class Security
{
    private static SecurityService $securityService;

    public static function getInstance(): SecurityService
    {
        if (!isset(self::$securityService)) {
            self::setInstance();
        }

        return self::$securityService;
    }

    protected static function setInstance(): void
    {
        self::$securityService = new SecurityService();
    }
}