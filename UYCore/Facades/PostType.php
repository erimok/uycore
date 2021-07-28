<?php


namespace UYCore\Facades;


use UYCore\PostTypes\PostType as Data;
use UYCore\PostTypes\PostTypeArgs;
use UYCore\PostTypes\PostTypeArgsFactory;
use UYCore\PostTypes\PostTypeRegistration;

final class PostType
{
    /**
     * @param string $post_type
     * @param \UYCore\PostTypes\PostTypeArgs|null $args
     */
    public static function register(string $post_type, ?PostTypeArgs $args = null): void
    {
        PostTypeRegistration::addPostType(new Data($post_type, $args));
    }

    public static function getArgs(): \UYCore\PostTypes\PostTypeArgs
    {
        PostTypeArgsFactory::clearArgs();
        return PostTypeArgsFactory::getArgs();
    }
}