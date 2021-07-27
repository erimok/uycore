<?php


namespace UYCore\Facades;


use UYCore\PostTypes\PostType as Data;
use UYCore\PostTypes\PostTypeRegistration;

final class PostType
{
    /**
     * @param string $post_type
     * @param string[]|null $args
     */
    public static function register(string $post_type, ?array $args = null)
    {
        PostTypeRegistration::addPostType(new Data($post_type, $args));
    }
}