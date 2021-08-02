<?php


namespace UYCore\ThemeSupport;

use UYCore\Service\WordPress;

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
     * @param array{options: array, theme_mods: array, widgets: array, nav_menus: array, attachments: array, posts: array} $params
     * @return $this
     */
    public function addStarterContent(array $params): self
    {
        if (WordPress::validateVersion(4.7)) {
            $this->addSupport('starter-content', $params);
        }

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
        if (WordPress::validateVersion(4.1)) {
            $this->addSupport('title-tag');
        }

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
        if (WordPress::validateVersion(4.5)) {
            $this->addSupport('custom-logo', $params);
        }

        return $this;
    }

    /**
     * @return $this
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    public function addCustomizeSelectiveRefreshWidgets(): self
    {
        if (WordPress::validateVersion(4.5)) {
            $this->addSupport('custom-logo');
        }

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
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('align-wide');
        }

        return $this;
    }

    /**
     * @param array[] $params
     * @return $this
     */
    public function addEditorColorPalette(array $params): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('editor-color-palette', $params);
        }

        return $this;
    }

    public function disableCustomColors(): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('disable-custom-colors');
        }

        return $this;
    }

    public function addEditorFontSizes(): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('editor-font-sizes');
        }

        return $this;
    }

    public function addEditorGradientPresets(array $params): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('editor-gradient-presets', $params);
        }

        return $this;
    }

    public function disableCustomGradients(): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('disable-custom-gradients');
        }

        return $this;
    }

    public function disableCustomFontSizes(): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('disable-custom-font-sizes');
        }

        return $this;
    }

    public function addEditorStyles(): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('editor-styles');
        }

        return $this;
    }

    public function addDarkEditorStyle(): self
    {
        if (!current_theme_supports('editor-styles')) {
            $this->addEditorStyles();
        }

        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('dark-editor-style');
        }

        return $this;
    }

    public function addWpBlockStyles(): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('wp-block-styles');
        }

        return $this;
    }

    public function addResponsiveEmbeds(): self
    {
        if (WordPress::validateVersion(5.0)) {
            $this->addSupport('responsive-embeds');
        }

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