<?php


namespace UYCore\Taxonomies;

// TODO abstract class?
final class TaxonomyRegistration
{
    /**
     * @var \UYCore\Taxonomies\TaxonomyData[]
     */
    private static array $taxonomies;

    public static function init(): void
    {
        add_action('init', [self::class, 'registerTaxonomies']);
    }

    public static function registerTaxonomies(): void
    {
        foreach (self::$taxonomies as $taxonomy) {
            self::registerTaxonomy($taxonomy);
        }
    }

    protected static function registerTaxonomy(TaxonomyData $taxonomy): void
    {
        try {
            self::isTaxonomyExist($taxonomy->getTaxonomy());
            self::validateTaxonomy(
                register_taxonomy($taxonomy->getTaxonomy(), [], $taxonomy->getArgs())
            );
        } catch (\Exception $e) {
            // TODO exception handler
        }
    }

    /**
     * @param \WP_Error|\WP_Taxonomy $taxonomy
     * @throws \Exception
     */
    protected static function validateTaxonomy($taxonomy)
    {
        if ($taxonomy instanceof \WP_Error) {
            throw new \Exception($taxonomy->get_all_error_data(), $taxonomy->get_error_code());
        }
    }

    /**
     * @throws \Exception
     */
    protected static function isTaxonomyExist(string $taxonomy): void
    {
        if (taxonomy_exists($taxonomy)) {
            throw new \Exception($taxonomy . ' already exist', 403);
        }
    }

    public static function addTaxonomy(TaxonomyData $taxonomy): void
    {
        self::$taxonomies[$taxonomy->getTaxonomy()] = $taxonomy;
    }
}