<?php


namespace UYCore\Facades;


use UYCore\Taxonomies\TaxonomyArgs;
use UYCore\Taxonomies\TaxonomyArgsFactory;
use UYCore\Taxonomies\TaxonomyData;
use UYCore\Taxonomies\TaxonomyRegistration;

final class Taxonomy
{
    public static function register(string $taxonomy, ?TaxonomyArgs $args = null): void
    {
        TaxonomyRegistration::addTaxonomy(new TaxonomyData($taxonomy, $args));
    }

    public static function getArgs(): TaxonomyArgs
    {
        TaxonomyArgsFactory::clearArgs();

        return TaxonomyArgsFactory::getArgs();
    }
}