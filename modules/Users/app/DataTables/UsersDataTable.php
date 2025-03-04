<?php

namespace Modules\Users\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    public function dataTable(Builder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id');
    }

    public function query(): Builder
    {
        return User::query();
    }

    public function html(): \Yajra\DataTables\Html\Builder
    {
        return parent::html()
            ->setTableId('users-table')
            ->orderBy(0)
            ->columns([
                Column::make('id'),
                Column::make('name'),
                Column::make('email'),
            ])
            ->addScript('users::partials._scripts');
    }
}
