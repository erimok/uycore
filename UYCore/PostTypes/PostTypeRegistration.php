<?php


namespace UYCore\PostTypes;


use UYCore\InitInterface;
use UYCore\PostTypes\Exceptions\PostTypeExistException;

final class PostTypeRegistration implements InitInterface
{
    /**
     * @var \UYCore\PostTypes\PostType[]
     */
    private static array $post_types;

    public static function init(): void
    {
        add_action('init', [self::class, 'registerPostTypes']);
    }

    public static function registerPostTypes()
    {
        foreach (self::$post_types as $post_type) {
            self::registerPostType($post_type);
        }
    }

    protected static function registerPostType(PostType $post_type): void
    {
        try {
            self::isPostTypeExist($post_type->getPostType());
            self::validatePostType(
                register_post_type($post_type->getPostType(), $post_type->getArgs())
            );
        } catch (\Exception $e) {
            // TODO exception handler
        }
    }

    /**
     * @param \WP_Error|\WP_Post_Type $post_type
     * @throws \Exception
     */
    protected static function validatePostType($post_type)
    {
        if ($post_type instanceof \WP_Error) {
            throw new \Exception($post_type->get_all_error_data(), $post_type->get_error_code());
        }
    }

    /**
     * @throws \Exception
     */
    protected static function isPostTypeExist(string $post_type): void
    {
        if (post_type_exists($post_type)) {
            throw new PostTypeExistException($post_type . ' already exist', 403);
        }
    }

    public static function addPostType(PostType $post_type): void
    {
        self::$post_types[$post_type->getPostType()] = $post_type;
    }
}