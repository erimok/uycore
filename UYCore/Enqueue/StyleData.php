<?php

namespace UYCore\Enqueue;

final class StyleData extends DependencyData
{
    private string $media;

    public function __construct(
        string $handle,
        string $src,
        array $dependencies,
        ?string $version = null,
        string $media = 'all'
    ) {
        parent::__construct($handle, $src, $dependencies, $version);

        $this->media = $media;
    }

    public function getMedia(): string
    {
        return $this->media;
    }
}