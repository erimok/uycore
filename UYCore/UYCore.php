<?php


namespace UYCore;


use UYCore\Enqueue\EnqueueRegistration;
use UYCore\PostTypes\PostTypeRegistration;
use UYCore\Taxonomies\TaxonomyRegistration;

// TODO add remove class method
final class UYCore implements InitInterface
{
    const TEXT_DOMAIN = 'uycore';

    /**
     * @var \UYCore\InitInterface[]
     */
    private static array $classes = [
        PostTypeRegistration::class,
        TaxonomyRegistration::class,
        EnqueueRegistration::class
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