<?php

namespace Modules\Users\DataTables;

use App\Editor\Buttons\CreateButton;
use App\Editor\Buttons\DeleteButton;
use App\Editor\Buttons\EditButton;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Layout;
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
            ->selectStyleOS()
            ->orderBy(0)
            ->columns([
                Column::make('id'),
                Column::make('name'),
                Column::make('email'),
            ])
            ->buttons([
                CreateButton::make(),
                CreateButton::make()->inline()->text('Inline Create'),
                EditButton::make(),
                DeleteButton::make(),
            ])
            ->editor(
                Editor::make()
            )
            ->layout(fn (Layout $layout) => $layout
                ->topStart('search')
                ->topEnd('buttons')
                ->bottomStart(['pageLength', 'info'])
            );
    }
}
