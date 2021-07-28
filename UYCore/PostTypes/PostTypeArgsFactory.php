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

    private static function setArgs()
    {
        self::$args = new PostTypeArgs();
    }

    public static function clearArgs(): void
    {
        if (!isset(self::$args)) {
            self::setArgs();
        }

        self::$args->setDescription();
        self::$args->setExcludeFromSearch();
        self::$args->setHasArchive();
        self::$args->setHierarchical();
        self::$args->setLabel();
        self::$args->setLabels();
        self::$args->setMenuIcon();
        self::$args->setMenuPosition();
        self::$args->setPublic();
        self::$args->setPubliclyQueryable();
        self::$args->setQueryVar();
        self::$args->setRestBase();
        self::$args->setRewrite();
        self::$args->setShowInMenu();
        self::$args->setShowInRest();
        self::$args->setSupports();
    }
}