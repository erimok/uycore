<?php

namespace UYCore\Facades;

use UYCore\Enqueue\EnqueueRegistration;
use UYCore\Enqueue\ScriptData;
use UYCore\Enqueue\StyleData;

final class Enqueue
{
    public static function enqueueStyle(
        string $handle,
        string $src,
        array $dependencies,
        ?string $version = null,
        string $media = 'all'
    ): void
    {
        EnqueueRegistration::addStyle(
            new StyleData($handle, $src, $dependencies, $version, $media)
        );
    }

    public static function enqueueScript(
        string $handle,
        string $src,
        array $dependencies,
        ?string $version = null,
        bool $in_footer = false
    )
    {
        EnqueueRegistration::addScript(
            new ScriptData($handle, $src, $dependencies, $version, $in_footer)
        );
    }
}