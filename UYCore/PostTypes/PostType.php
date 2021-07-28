<?php


namespace UYCore\PostTypes;


final class PostType
{
    private string $post_type;
    private PostTypeArgs $args;

    public function __construct(string $post_type, ?PostTypeArgs $args = null)
    {
        $this->post_type = $post_type;
        empty($args) ? \UYCore\Facades\PostType::getArgs() : $this->args = $args;
    }

    public function getPostType(): string
    {
        return $this->post_type;
    }

    /**
     * @return string[]
     */
    public function getArgs(): array
    {
        return $this->args->getArray();
    }
}