<?php

namespace UYCore\Facades;

use UYCore\Notices\NoticeService;
use UYCore\Notices\Notice as NoticeData;

final class Notice
{
    public static function addNotice(
        string $message,
        string $ccsClass = 'notice-warning',
        bool $isDismissible = false
    ): void
    {
        NoticeService::addNotice(new NoticeData($message, $ccsClass, $isDismissible));
    }
}