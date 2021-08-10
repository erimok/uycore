<?php

namespace UYCore\Enqueue;

abstract class DependencyData
{
    private string $handle;
    private string $src;

    /**
     * @var string[]
     */
    private array $dependencies;
    private ?string $version;

    public function __construct(
        string $handle,
        string $src,
        array $dependencies,
        ?string $version = null
    ) {
        $this->handle = $handle;
        $this->src = $src;
        $this->dependencies = $dependencies;
        $this->version = $version;
    }

    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getSrc(): string
    {
        return $this->src;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }
}