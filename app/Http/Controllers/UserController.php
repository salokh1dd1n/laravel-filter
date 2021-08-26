<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Models\User;
use App\Payloads\UserPayload;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UserFilter $filters)
    {
        $payload = UserPayload::getFilters($request->all());

        $users = User::filter($filters)->get();

        return view('users', compact('users'));
    }
}
