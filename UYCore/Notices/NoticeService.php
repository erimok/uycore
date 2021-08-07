<?php

namespace UYCore\Notices;

use UYCore\InitInterface;

final class NoticeService implements InitInterface
{
    /**
     * @var \UYCore\Notices\Notice[]
     */
    private static array $notices;

    public static function init(): void
    {
        add_action('admin_notices', [self::class, 'renderNotices']);
    }

    public static function renderNotices(): void
    {
        foreach (self::$notices as $notice) {
            self::renderNotice($notice);
        }
    }

    protected static function renderNotice(Notice $notice): void
    {
        echo '<div class="notice '. $notice->getCssClasses() .'">';
        echo $notice->getMessage();
        echo '</div>';
    }

    public static function addNotice($notice): void
    {
        self::$notices[] = $notice;
    }
}