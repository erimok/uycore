<?php

namespace UYCore\Enqueue;

use UYCore\InitInterface;

final class EnqueueRegistration implements InitInterface
{
    /**
     * @var \UYCore\Enqueue\StyleData[]
     */
    private static array $styles;

    /**
     * @var \UYCore\Enqueue\ScriptData[]
     */
    private static array $scripts;

    public static function init(): void
    {
        add_action('wp_enqueue_scripts', [self::class, 'registerStylesAndScripts']);
    }

    public static function registerStylesAndScripts(): void
    {
        self::registerStyles();
        self::registerScripts();
    }

    protected static function registerStyles(): void
    {
        foreach (self::$styles as $style) {
            wp_enqueue_style(
                $style->getHandle(),
                $style->getSrc(),
                $style->getDependencies(),
                $style->getVersion(),
                $style->getMedia()
            );
        }
    }

    public static function addStyle(StyleData $style): void
    {
        self::$styles[$style->getHandle()] = $style;
    }

    protected static function registerScripts(): void
    {
        foreach (self::$scripts as $script) {
            wp_enqueue_script(
                $script->getHandle(),
                $script->getSrc(),
                $script->getDependencies(),
                $script->getVersion(),
                $script->getInFooter()
            );
        }
    }

    public static function addScript(ScriptData $script): void
    {
        self::$scripts[$script->getHandle()] = $script;
    }
}