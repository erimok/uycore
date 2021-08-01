<?php


namespace UYCore\Facades;


use UYCore\PostTypes\PostTypeData;
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
        PostTypeRegistration::addPostType(new PostTypeData($post_type, $args));
    }

    public static function getArgs(): PostTypeArgs
    {
        PostTypeArgsFactory::clearArgs();

        return PostTypeArgsFactory::getArgs();
    }
}