<?php


namespace UYCore\Services;


use UYCore\UYCore;

final class LabelGenerator
{
    public static function getPostTypeLabels(string $singular, string $plural): array
    {
        $singular = self::getPreparedString($singular);
        $plural = self::getPreparedString($plural);
        $Singular = ucfirst($singular);
        $Plural = ucfirst($plural);

        return [
            'name' => $Plural,
            'singular_name' => $Singular,
            'add_new' => sprintf(
                esc_html__('Add New %s', UYCore::TEXT_DOMAIN),
                $singular
            ),
            'edit_item' => sprintf(
                esc_html__('Edit %s', UYCore::TEXT_DOMAIN),
                $singular
            ),
            'new_item' => sprintf(
                esc_html__('New %s', UYCore::TEXT_DOMAIN),
                $singular
            ),
            'view_item' => sprintf(
                esc_html__('View %s', UYCore::TEXT_DOMAIN),
                $singular
            ),
            'view_items' => sprintf(
                esc_html__('View %s', UYCore::TEXT_DOMAIN),
                $plural
            ),
            'search_items' => sprintf(
                esc_html__('Search %s', UYCore::TEXT_DOMAIN),
                $plural
            ),
            'not_found' => sprintf(
                esc_html__("No %s found", UYCore::TEXT_DOMAIN),
                $plural
            ),
            'not_found_in_trash' => sprintf(
                esc_html__("No %s found in Trash", UYCore::TEXT_DOMAIN),
                $plural
            ),
            'parent_item_colon' => sprintf(
                esc_html__('Parent %s', UYCore::TEXT_DOMAIN),
                $singular
            ),
            'all_items' => sprintf(
                esc_html__('All %s', UYCore::TEXT_DOMAIN),
                $plural
            ),
            'archives' => sprintf(
                esc_html__('%s archives', UYCore::TEXT_DOMAIN),
                $Singular
            ),
            'attributes' => sprintf(
                esc_html__('%s attributes', UYCore::TEXT_DOMAIN),
                $Singular
            ),
            'insert_into_item' => sprintf(
                esc_html__('Insert into %s', UYCore::TEXT_DOMAIN),
                $singular
            ),
            'uploaded_to_this_item' => sprintf(
                esc_html__('Uploaded to this %s', UYCore::TEXT_DOMAIN),
                $singular
            ),
            'filter_items_list' => sprintf(
                esc_html__("Filter %s list", UYCore::TEXT_DOMAIN),
                $plural
            ),
            'items_list_navigation' => sprintf(
                esc_html__('%s list navigation', UYCore::TEXT_DOMAIN),
                $Plural
            ),
            'items_list' => sprintf(
                esc_html__('%s list', UYCore::TEXT_DOMAIN),
                $Singular
            ),
            'item_published' => sprintf(
                esc_html__('%s published', UYCore::TEXT_DOMAIN),
                $Singular
            ),
            'item_published_privately' => sprintf(
                esc_html__('%s published privately', UYCore::TEXT_DOMAIN),
                $Singular
            ),
            'item_reverted_to_draft' => sprintf(
                esc_html__('%s reverted to draft', UYCore::TEXT_DOMAIN),
                $Singular
            ),
            'item_scheduled' => sprintf(
                esc_html__('%s scheduled', UYCore::TEXT_DOMAIN),
                $Singular
            ),
            'item_updated' => sprintf(
                esc_html__('%s updated', UYCore::TEXT_DOMAIN),
                $Singular
            ),
        ];
    }

    protected static function getPreparedString(string $string): string
    {
        return strtolower($string);
    }
}