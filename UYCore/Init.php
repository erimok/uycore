<?php


namespace UYCore;


use UYCore\PostTypes\PostTypeRegistration;

final class Init implements InitInterface
{
    /**
     * @var \UYCore\InitInterface[]
     */
    private static array $classes = [
        PostTypeRegistration::class
    ];

    public static function init(): void
    {
        foreach (self::$classes as $class) {
            $class::init();
        }
    }

    public static function addClass(InitInterface $class): void
    {
        self::$classes[] = $class;
    }
}