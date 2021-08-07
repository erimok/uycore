<?php

namespace UYCore\Security;

final class XmlRpc
{
    public static function disable(): void
    {
        add_filter('xmlrpc_enabled', '__return_false');
    }
}