<?php

namespace UYCore\Security;

final class ApiProtection
{
    public static function protectAllEndpointsByAuth(): void
    {
        add_filter('rest_authentication_errors', [self::class, 'secureApiByAuth']);
    }
    
    /**
     * @param $result
     * @return \WP_Error|null|true
     */
    public static function secureApiByAuth($result): ?\WP_Error
    {
        if (!empty($result)) {
            return $result;
        }

        if (!is_user_logged_in()) {
            return new \WP_Error(
                'rest_not_logged_in',
                'You are not currently logged in.',
                ['status' => 401]
            );
        }

        return $result;
    }
}