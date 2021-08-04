<?php

namespace UYCore\Taxonomies;

use UYCore\PostTypes\Interfaces\ArrayInterface;

// TODO add all args
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
    private bool $hierarchical = true;
    /**
     * @var bool|array
     */
    private bool $rewrite = true;
    private array $capabilities = self::CAPABILITIES;
    private bool $show_admin_column = false;
    private ?bool $show_in_rest = null;
    private ?string $rest_base = null;

    public function getArray(): array
    {
        return [
            'description' => $this->description,
            'labels' => $this->labels,
            'public' => $this->public,
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

    public function setDefaultValues(): self
    {
        $this->setCapabilities()
            ->setDescription()
            ->setHierarchical()
            ->setLabels()
            ->setPublic()
            ->setRestBase()
            ->setRewrite()
            ->setShowAdminColumn()
            ->setShowInRest();

        return $this;
    }
}