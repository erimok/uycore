<?php

namespace UYCore\Taxonomies;

final class TaxonomyArgsFactory
{
    private static TaxonomyArgs $args;

    public static function getArgs(): TaxonomyArgs
    {
        if (!isset(self::$args)) {
            self::setArgs();
        }

        return self::$args;
    }

    private static function setArgs(): void
    {
        self::$args = new TaxonomyArgs();
    }

    public static function clearArgs(): void
    {
        if (!isset(self::$args)) {
            self::setArgs();
        }

        self::$args->setDefaultValues();
    }
}