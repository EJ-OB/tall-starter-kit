<?php

namespace App\Editor\Buttons;

use Yajra\DataTables\Html\Button;

class EditButton extends Button
{
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this
            ->extend('editSingle')
            ->editor('editor')
            ->text('Edit');
    }

    public function multi(): static
    {
        $this->extend('edit');

        return $this;
    }
}
