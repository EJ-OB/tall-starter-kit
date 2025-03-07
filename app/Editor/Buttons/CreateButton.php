<?php

namespace App\Editor\Buttons;

use Yajra\DataTables\Html\Button;

class CreateButton extends Button
{
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this
            ->extend('create')
            ->editor('editor')
            ->text('Create');
    }

    public function inline(): static
    {
        return $this->extend('createInline');
    }
}
