<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Modules\Users\DataTables\UsersDataTable;

class UserController
{
    public function index(UsersDataTable $dataTable): Renderable|JsonResponse
    {
        return $dataTable->render('users::index');
    }
}
