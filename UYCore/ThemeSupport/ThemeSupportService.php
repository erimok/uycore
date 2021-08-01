<?php


namespace UYCore\ThemeSupport;

// TODO WP version validation need to add
final class ThemeSupportService
{
    /**
     * @param string[] $formats
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-formats
     * @link https://wordpress.org/support/article/post-formats/
     */
    public function addPostFormats(array $formats): self
    {
        $this->addSupport('post-formats', $formats);

        return $this;
    }

    /**
     * @param string[] $post_types
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
     */
    public function addPostThumbnails(array $post_types): self
    {
        $this->addSupport('post-thumbnails', $post_types);

        return $this;
    }

    /**
     * @param string[]|null $params
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
     */
    public function addCustomBackground(?array $params = null): self
    {
        $this->addSupport('custom-background', $params);

        return $this;
    }

    /**
     * @param string[]|null $params
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
     */
    public function addCustomHeader(?array $params = null): self
    {
        $this->addSupport('custom-header', $params);

        return $this;
    }

    /**
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
     */
    public function addAutomaticFeedLinks(): self
    {
        $this->addSupport('automatic-feed-links');

        return $this;
    }

    /**
     * @param string[] $params
     * @return $this
     */
    public function addHtml5(?array $params = null): self
    {
        $this->addSupport('html5', is_null($params)
            ? ['comment-list', 'comment-form', 'search-form']
            : $params);

        return $this;
    }

    /**
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    public function addTitleTag(): self
    {
        $this->addSupport('title-tag');

        return $this;
    }

    /**
     * @param string[] $params
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
     */
    public function addCustomLogo(array $params): self
    {
        $this->addSupport('custom-logo', $params);

        return $this;
    }

    /**
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    public function addCustomizeSelectiveRefreshWidgets(): self
    {
        $this->addSupport('custom-logo');

        return $this;
    }

    /**
     * @param string[] $params
     * @return $this
     */
    public function addAdminBar(array $params): self
    {
        $this->addSupport('admin-bar', $params);

        return $this;
    }

    public function addAlignWide(): self
    {
        $this->addSupport('align-wide');

        return $this;
    }

    /**
     * @param array[] $params
     * @return $this
     */
    public function addEditorColorPalette(array $params): self
    {
        $this->addSupport('editor-color-palette', $params);

        return $this;
    }

    public function disableCustomColors(): self
    {
        $this->addSupport('disable-custom-colors');

        return $this;
    }
    
    public function addEditorFontSizes(): self
    {
        $this->addSupport('editor-font-sizes');

        return $this;
    }

    public function addEditorGradientPresets(array $params): self
    {
        $this->addSupport('editor-gradient-presets', $params);

        return $this;
    }

    public function disableCustomGradients(): self
    {
        $this->addSupport('disable-custom-gradients');

        return $this;
    }

    public function disableCustomFontSizes(): self
    {
        $this->addSupport('disable-custom-font-sizes');

        return $this;
    }

    public function addEditorStyles(): self
    {
        $this->addSupport('editor-styles');

        return $this;
    }

    public function addDarkEditorStyle(): self
    {
        if (!current_theme_supports('editor-styles')) {
            $this->addEditorStyles();
        }

        $this->addSupport('dark-editor-style');

        return $this;
    }

    public function addWpBlockStyles(): self
    {
        $this->addSupport('wp-block-styles');

        return $this;
    }

    public function addResponsiveEmbeds(): self
    {
        $this->addSupport('responsive-embeds');

        return $this;
    }

    protected function addSupport(string $feature, ?array $params = null): self
    {
        add_action('after_setup_theme', function () use ($feature, $params) {
            add_theme_support($feature, $params);
        });

        return $this;
    }
}