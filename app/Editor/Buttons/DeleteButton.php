<?php

namespace App\Editor\Buttons;

use Yajra\DataTables\Html\Button;

class DeleteButton extends Button
{
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this
            ->extend('removeSingle')
            ->editor('editor')
            ->text('Delete');
    }

    public function multi(): static
    {
        $this->extend('remove');

        return $this;
    }
}
