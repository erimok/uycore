<?php


namespace UYCore\PostTypes;


use UYCore\PostTypes\Interfaces\ArrayInterface;
use WP_REST_Posts_Controller;

final class PostTypeArgs implements ArrayInterface
{
    const DEFAULT_CAPABILITIES = [
        'delete_posts'           => 'edit_theme_options',
        'delete_post'            => 'edit_theme_options',
        'delete_published_posts' => 'edit_theme_options',
        'delete_private_posts'   => 'edit_theme_options',
        'delete_others_posts'    => 'edit_theme_options',
        'edit_post'              => 'edit_css',
        'edit_posts'             => 'edit_css',
        'edit_others_posts'      => 'edit_css',
        'edit_published_posts'   => 'edit_css',
        'read_post'              => 'read',
        'read_private_posts'     => 'read',
        'publish_posts'          => 'edit_theme_options',
    ];

    private ?string $label = null;
    private ?array $labels = null;
    private string $description = '';
    private bool $public = true;
    private bool $publicly_queryable = true;
    private bool $show_ui = true;
    private ?bool $show_in_admin_bar = null;
    private bool $show_in_nav_menus = true;
    private ?bool $show_in_menu = null;
    private ?bool $show_in_rest = null;
    private ?bool $rest_base = null;
    private string $rest_controller_class = WP_REST_Posts_Controller::class;
    private ?int $menu_position = null;
    private ?string $menu_icon = null;
    /**
     * @var string|string[]
     */
    private $capability_type = 'post';
    private array $capabilities = self::DEFAULT_CAPABILITIES;
    private ?bool $map_meta_cap = null;
    private bool $hierarchical = false;
    private bool $exclude_from_search = false;
    private bool $has_archive = false;
    private bool $can_export = true;
    private ?bool $delete_with_user = null;
    /**
     * @var string[]
     */
    private array $template = [];
    /**
     * @var bool|string
     */
    private $template_lock = false;

    /**
     * @var string[]
     */
    private array $supports = [];

    /**
     * @var string[]
     */
    private array $taxonomies = [];

    /**
     * @var bool|array
     */
    private $rewrite = false;

    /**
     * @var bool|string
     */
    private bool $query_var = false;

    public function getArray(): array
    {
        return [
            'can_export' => $this->can_export,
            'capabilities' => $this->capabilities,
            'capability_type' => $this->capability_type,
            'delete_with_user' => $this->delete_with_user,
            'description' => $this->description,
            'exclude_from_search' => $this->exclude_from_search,
            'has_archive' => $this->has_archive,
            'hierarchical' => $this->hierarchical,
            'label' => $this->label,
            'labels' => $this->labels,
            'map_meta_cap' => $this->map_meta_cap,
            'menu_icon' => $this->menu_icon,
            'menu_position' => $this->menu_position,
            'public' => $this->public,
            'publicly_queryable' => $this->publicly_queryable,
            'query_var' => $this->query_var,
            'rest_base' => $this->rest_base,
            'rest_controller_class' => $this->rest_controller_class,
            'rewrite' => $this->rewrite,
            'show_in_admin_bar' => $this->show_in_admin_bar,
            'show_in_menu' => $this->show_in_menu,
            'show_in_nav_menus' => $this->show_in_nav_menus,
            'show_in_rest' => $this->show_in_rest,
            'show_ui' => $this->show_ui,
            'supports' => $this->supports,
            'taxonomies' => $this->taxonomies,
            'template' => $this->template,
            'template_lock' => $this->template_lock,
        ];
    }

    public function setDescription(string $description = ''): self
    {
        $this->description = $description;

        return $this;
    }

    public function setExcludeFromSearch(bool $exclude_from_search = false): self
    {
        $this->exclude_from_search = $exclude_from_search;

        return $this;
    }

    public function setHasArchive(bool $has_archive = true): self
    {
        $this->has_archive = $has_archive;

        return $this;
    }

    public function setHierarchical(bool $hierarchical = false): self
    {
        $this->hierarchical = $hierarchical;

        return $this;
    }

    public function setLabel(?string $label = null): self
    {
        $this->label = $label;

        return $this;
    }

    public function setLabels(?array $labels = null): self
    {
        $this->labels = $labels;

        return $this;
    }

    public function setMenuIcon(?string $menu_icon = null): self
    {
        $this->menu_icon = $menu_icon;

        return $this;
    }

    public function setMenuPosition(?int $menu_position = null): self
    {
        $this->menu_position = $menu_position;

        return $this;
    }

    public function setPublic(bool $public = true): self
    {
        $this->public = $public;

        return $this;
    }

    public function setPubliclyQueryable(bool $publicly_queryable = true): self
    {
        $this->publicly_queryable = $publicly_queryable;

        return $this;
    }

    /**
     * @param bool|string $query_var
     */
    public function setQueryVar($query_var = false): self
    {
        $this->query_var = $query_var;

        return $this;
    }

    public function setRestBase(?bool $rest_base = null): self
    {
        $this->rest_base = $rest_base;

        return $this;
    }

    /**
     * @param array|bool $rewrite
     */
    public function setRewrite($rewrite = true): self
    {
        $this->rewrite = $rewrite;

        return $this;
    }

    /**
     * @param bool|null $show_in_menu
     */
    public function setShowInMenu(?bool $show_in_menu = null): self
    {
        $this->show_in_menu = $show_in_menu;

        return $this;
    }

    /**
     * @param bool|null $show_in_rest
     */
    public function setShowInRest(?bool $show_in_rest = null): self
    {
        $this->show_in_rest = $show_in_rest;

        return $this;
    }

    /**
     * @param string[] $supports
     */
    public function setSupports(array $supports = [PostTypeSupport::TITLE, PostTypeSupport::EDITOR]): self
    {
        $this->supports = $supports;

        return $this;
    }

    /**
     * @param string[] $taxonomies
     */
    public function setTaxonomies(array $taxonomies = []): self
    {
        $this->taxonomies = $taxonomies;

        return $this;
    }

    public function setCanExport(bool $can_export = true): self
    {
        $this->can_export = $can_export;

        return $this;
    }

    /**
     * @param array|string[] $capabilities
     */
    public function setCapabilities(array $capabilities = self::DEFAULT_CAPABILITIES): self
    {
        $this->capabilities = $capabilities;

        return $this;
    }

    /**
     * @param string|string[] $capability_type
     */
    public function setCapabilityType($capability_type = 'post'): self
    {
        $this->capability_type = $capability_type;

        return $this;
    }

    /**
     * @param bool|null $delete_with_user
     * @return \UYCore\PostTypes\PostTypeArgs
     */
    public function setDeleteWithUser(?bool $delete_with_user = null): self
    {
        $this->delete_with_user = $delete_with_user;

        return $this;
    }

    /**
     * @param bool|null $map_meta_cap
     * @return \UYCore\PostTypes\PostTypeArgs
     */
    public function setMapMetaCap(?bool $map_meta_cap = null): self
    {
        $this->map_meta_cap = $map_meta_cap;

        return $this;
    }

    /**
     * @param string $rest_controller_class
     * @return \UYCore\PostTypes\PostTypeArgs
     */
    public function setRestControllerClass(string $rest_controller_class = WP_REST_Posts_Controller::class): self
    {
        $this->rest_controller_class = $rest_controller_class;

        return $this;
    }

    /**
     * @param bool|null $show_in_admin_bar
     * @return \UYCore\PostTypes\PostTypeArgs
     */
    public function setShowInAdminBar(?bool $show_in_admin_bar = null): self
    {
        $this->show_in_admin_bar = $show_in_admin_bar;

        return $this;
    }

    /**
     * @param bool $show_in_nav_menus
     * @return \UYCore\PostTypes\PostTypeArgs
     */
    public function setShowInNavMenus(bool $show_in_nav_menus = true): self
    {
        $this->show_in_nav_menus = $show_in_nav_menus;

        return $this;
    }

    /**
     * @param bool $show_ui
     * @return \UYCore\PostTypes\PostTypeArgs
     */
    public function setShowUi(bool $show_ui = true): self
    {
        $this->show_ui = $show_ui;

        return $this;
    }

    /**
     * @param string[] $template
     */
    public function setTemplate(array $template = []): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @param bool|string $template_lock
     */
    public function setTemplateLock($template_lock = false): self
    {
        $this->template_lock = $template_lock;

        return $this;
    }

    public function setDefaultValues(): self
    {
        $this->setExcludeFromSearch()
            ->setCanExport()
            ->setCapabilities()
            ->setCapabilityType()
            ->setDeleteWithUser()
            ->setDescription()
            ->setHasArchive()
            ->setHierarchical()
            ->setLabel()
            ->setLabels()
            ->setMapMetaCap()
            ->setMenuIcon()
            ->setMenuPosition()
            ->setPublic()
            ->setPubliclyQueryable()
            ->setQueryVar()
            ->setRestBase()
            ->setRestControllerClass()
            ->setRewrite()
            ->setShowInAdminBar()
            ->setShowInMenu()
            ->setShowInNavMenus()
            ->setShowInRest()
            ->setShowUi()
            ->setSupports()
            ->setTemplate()
            ->setTemplateLock();

        return $this;
    }
}