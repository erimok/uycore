<?php

namespace UYCore\Services;

final class WordPress
{
    public static function validateVersion(float $required_version): bool
    {
        return $required_version >= get_bloginfo('version');
    }
}