<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Models\User;
use App\Payloads\UserPayload;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @param UserFilter $filter
     * @return Application|Factory|View
     */
    public function index(Request $request, UserFilter $filter): View|Factory|Application
    {
        $attributes = UserPayload::getFilters($request->all());
        $users = User::filter($filter, $attributes)->get();

        return view('users', compact('users'));
    }
}
