<?php


namespace UYCore\PostTypes;


use UYCore\PostTypes\Interfaces\ArrayInterface;

final class PostTypeArgs implements ArrayInterface
{
    private ?string $label = null;
    private ?array $labels = null;
    private string $description = '';
    private bool $public = true;
    private ?bool $show_in_menu = null;
    private ?bool $show_in_rest = null;
    private ?bool $rest_base = null;
    private ?int $menu_position = null;
    private ?string $menu_icon = null;
    private bool $hierarchical = false;

    /**
     * @var string[]
     */
    private array $supports = [];

    /**
     * @var string[]
     */
    private array $taxonomies = [];

    private bool $has_archive = false;

    /**
     * @var bool|array
     */
    private $rewrite = false;

    /**
     * @var bool|string
     */
    private bool $query_var = false;

    private bool $publicly_queryable = true;
    private bool $exclude_from_search = false;

    public function getArray(): array
    {
        return [
            'description' => $this->description,
            'exclude_from_search' => $this->exclude_from_search,
            'has_archive' => $this->has_archive,
            'hierarchical' => $this->hierarchical,
            'label' => $this->label,
            'labels' => $this->labels,
            'menu_icon' => $this->menu_icon,
            'menu_position' => $this->menu_position,
            'public' => $this->public,
            'publicly_queryable' => $this->publicly_queryable,
            'query_var' => $this->query_var,
            'rest_base' => $this->rest_base,
            'rewrite' => $this->rewrite,
            'show_in_menu' => $this->show_in_menu,
            'show_in_rest' => $this->show_in_rest,
            'supports' => $this->supports,
            'taxonomies' => $this->taxonomies,
        ];
    }

    public function setDescription(string $description = ''): void
    {
        $this->description = $description;
    }

    public function setExcludeFromSearch(bool $exclude_from_search = false): void
    {
        $this->exclude_from_search = $exclude_from_search;
    }

    public function setHasArchive(bool $has_archive = true): void
    {
        $this->has_archive = $has_archive;
    }

    public function setHierarchical(bool $hierarchical = false): void
    {
        $this->hierarchical = $hierarchical;
    }

    public function setLabel(?string $label = null): void
    {
        $this->label = $label;
    }

    public function setLabels(?array $labels = null): void
    {
        $this->labels = $labels;
    }

    public function setMenuIcon(?string $menu_icon = null): void
    {
        $this->menu_icon = $menu_icon;
    }

    public function setMenuPosition(?int $menu_position = null): void
    {
        $this->menu_position = $menu_position;
    }

    public function setPublic(bool $public = true): void
    {
        $this->public = $public;
    }

    public function setPubliclyQueryable(bool $publicly_queryable = true): void
    {
        $this->publicly_queryable = $publicly_queryable;
    }

    /**
     * @param bool|string $query_var
     */
    public function setQueryVar($query_var = false): void
    {
        $this->query_var = $query_var;
    }

    public function setRestBase(?bool $rest_base = null): void
    {
        $this->rest_base = $rest_base;
    }

    /**
     * @param array|bool $rewrite
     */
    public function setRewrite($rewrite = true): void
    {
        $this->rewrite = $rewrite;
    }

    /**
     * @param bool|null $show_in_menu
     */
    public function setShowInMenu(?bool $show_in_menu = null): void
    {
        $this->show_in_menu = $show_in_menu;
    }

    /**
     * @param bool|null $show_in_rest
     */
    public function setShowInRest(?bool $show_in_rest = null): void
    {
        $this->show_in_rest = $show_in_rest;
    }

    /**
     * @param string[] $supports
     */
    public function setSupports(array $supports = [PostTypeSupport::TITLE, PostTypeSupport::EDITOR]): void
    {
        $this->supports = $supports;
    }

    /**
     * @param string[] $taxonomies
     */
    public function setTaxonomies(array $taxonomies = []): void
    {
        $this->taxonomies = $taxonomies;
    }
}