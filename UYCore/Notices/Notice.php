<?php

namespace UYCore\Notices;

final class Notice
{
    private string $ccs_classes;
    private bool $is_dismissible;
    private string $message;

    public function __construct(
        string $message,
        string $ccs_class = 'notice-warning',
        bool $is_dismissible = false
    ) {
        $this->message = $message;
        $this->ccs_classes = $ccs_class;
        $this->is_dismissible = $is_dismissible;
    }

    public function getCssClasses(): string
    {
        return $this->ccs_classes . $this->is_dismissible ? ' is-dismissible' : '';
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}