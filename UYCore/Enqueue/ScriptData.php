<?php

namespace UYCore\Enqueue;

final class ScriptData extends DependencyData
{
    private bool $in_footer;

    public function __construct(
        string $handle,
        string $src,
        array $dependencies,
        ?string $version = null,
        bool $in_footer = false
    ) {
        parent::__construct($handle, $src, $dependencies, $version);

        $this->in_footer = $in_footer;
    }

    public function getInFooter(): bool
    {
        return $this->in_footer;
    }
}