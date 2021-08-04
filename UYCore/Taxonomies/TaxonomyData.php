<?php


namespace UYCore\Taxonomies;


use UYCore\Facades\Taxonomy;

final class TaxonomyData
{
    private string $taxonomy;
    private TaxonomyArgs $args;

    public function __construct(string $taxonomy, ?TaxonomyArgs $args = null)
    {
        $this->taxonomy = $taxonomy;
        empty($args) ? Taxonomy::getArgs() : $this->args = $args;
    }

    public function getTaxonomy(): string
    {
        return $this->taxonomy;
    }

    /**
     * @return string[]
     */
    public function getArgs(): array
    {
        return $this->args->getArray();
    }
}