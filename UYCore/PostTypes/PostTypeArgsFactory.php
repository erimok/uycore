<?php


namespace UYCore\PostTypes;


final class PostTypeArgsFactory
{
    private static PostTypeArgs $args;

    /**
     * @return \UYCore\PostTypes\PostTypeArgs
     */
    public static function getArgs(): PostTypeArgs
    {
        if (!isset(self::$args)) {
            self::setArgs();
        }

        return self::$args;
    }

    private static function setArgs(): void
    {
        self::$args = new PostTypeArgs();
    }

    public static function clearArgs(): void
    {
        if (!isset(self::$args)) {
            self::setArgs();
        }

        self::$args->setDefaultValues();
    }
}