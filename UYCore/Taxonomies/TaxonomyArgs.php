<?php

namespace UYCore\Taxonomies;

use UYCore\PostTypes\Interfaces\ArrayInterface;

final class TaxonomyArgs implements ArrayInterface
{
    const CAPABILITIES = [
        'manage_categories',
        'manage_categories',
        'manage_categories',
        'edit_posts'
    ];

    private string $description = '';
    /**
     * @var string[]
     */
    private array $labels = [];
    private bool $public = true;
    private bool $show_ui = true;
    private bool $show_in_menu = true;
    private bool $show_in_nav_menus = true;
    private bool $show_tagcloud = true;
    private ?bool $show_in_rest = null;
    private ?string $rest_base = null;
    private string $rest_controller_class = \WP_REST_Terms_Controller::class;
    private bool $hierarchical = true;
    /**
     * @var bool|array
     */
    private bool $rewrite = true;
    private ?bool $publicly_queryable = null;
    private array $capabilities = self::CAPABILITIES;
    private ?string $meta_box_cb = null;
    private bool $show_admin_column = false;
    private ?bool $show_in_quick_edit = null;
    private ?bool $sort = null;
    private array $default_term = [];

    public function getArray(): array
    {
        return [
            'description' => $this->description,
            'labels' => $this->labels,
            'public' => $this->public,
            'show_ui' => $this->show_ui,
            'show_in_menu' => $this->show_in_menu,
            'show_in_nav_menus' => $this->show_in_nav_menus,
            'show_tagcloud' => $this->show_tagcloud,
            'rest_controller_class' => $this->rest_controller_class,
            'publicly_queryable' => $this->publicly_queryable,
            'meta_box_cb' => $this->meta_box_cb,
            'show_in_quick_edit' => $this->show_in_quick_edit,
            'sort' => $this->sort,
            'default_term' => $this->default_term,
            'hierarchical' => $this->hierarchical,
            'rewrite' => $this->rewrite,
            'capabilities' => $this->capabilities,
            'show_admin_column' => $this->show_admin_column,
            'show_in_rest' => $this->show_in_rest,
            'rest_base' => $this->rest_base,
        ];
    }

    public function setCapabilities(array $capabilities = self::CAPABILITIES): self
    {
        $this->capabilities = $capabilities;

        return $this;
    }

    public function setDescription(string $description = ''): self
    {
        $this->description = $description;

        return $this;
    }

    public function setHierarchical(bool $hierarchical = true): self
    {
        $this->hierarchical = $hierarchical;

        return $this;
    }

    public function setPublic(bool $public = true): self
    {
        $this->public = $public;

        return $this;
    }

    public function setRestBase(?string $rest_base = null): self
    {
        $this->rest_base = $rest_base;

        return $this;
    }

    /**
     * @param bool|array $rewrite
     */
    public function setRewrite(bool $rewrite = true): self
    {
        $this->rewrite = $rewrite;

        return $this;
    }

    public function setShowAdminColumn(bool $show_admin_column = false): self
    {
        $this->show_admin_column = $show_admin_column;

        return $this;
    }

    public function setShowInRest(?bool $show_in_rest = true): self
    {
        $this->show_in_rest = $show_in_rest;

        return $this;
    }

    /**
     * @param string[] $labels
     */
    public function setLabels(array $labels = []): self
    {
        $this->labels = $labels;

        return $this;
    }

    public function setDefaultTerm(array $default_term = []): self
    {
        $this->default_term = $default_term;

        return $this;
    }

    public function setMetaBoxCb(?string $meta_box_cb = null): self
    {
        $this->meta_box_cb = $meta_box_cb;

        return $this;
    }

    public function setPubliclyQueryable(?bool $publicly_queryable = null): self
    {
        $this->publicly_queryable = $publicly_queryable;

        return $this;
    }

    public function setRestControllerClass(string $rest_controller_class = \WP_REST_Terms_Controller::class): self
    {
        $this->rest_controller_class = $rest_controller_class;

        return $this;
    }

    public function setShowInMenu(bool $show_in_menu = true): self
    {
        $this->show_in_menu = $show_in_menu;

        return $this;
    }

    public function setShowInNavMenus(bool $show_in_nav_menus = true): self
    {
        $this->show_in_nav_menus = $show_in_nav_menus;

        return $this;
    }

    public function setShowInQuickEdit(?bool $show_in_quick_edit = null): self
    {
        $this->show_in_quick_edit = $show_in_quick_edit;

        return $this;
    }

    public function setShowTagcloud(bool $show_tagcloud = true): self
    {
        $this->show_tagcloud = $show_tagcloud;

        return $this;
    }

    public function setShowUi(bool $show_ui = true): self
    {
        $this->show_ui = $show_ui;

        return $this;
    }

    public function setSort(?bool $sort = null): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function setDefaultValues(): self
    {
        $this->setCapabilities()
            ->setDescription()
            ->setHierarchical()
            ->setLabels()
            ->setPublic()
            ->setDefaultTerm()
            ->setMetaBoxCb()
            ->setPubliclyQueryable()
            ->setRestControllerClass()
            ->setShowInMenu()
            ->setShowInNavMenus()
            ->setShowInQuickEdit()
            ->setShowTagcloud()
            ->setShowUi()
            ->setSort()
            ->setRestBase()
            ->setRewrite()
            ->setShowAdminColumn()
            ->setShowInRest();

        return $this;
    }
}