<?php


namespace UYCore\PostTypes;


final class PostType
{
    private string $post_type;

    /**
     * @var string[]
     */
    private array $args;

    /**
     * PostTypeProxy constructor.
     * @param string $post_type
     * @param string[] $args
     */
    public function __construct(string $post_type, ?array $args = null)
    {
        $this->post_type = $post_type;
        $this->args = $args ?? [];
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
        return $this->args;
    }
}