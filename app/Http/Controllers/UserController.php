<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => ['index']]);
        $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        return User::paginate($request->get('per_page') ?? 10)->fragment('users');
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function update(Request $request, $id)
    {
        return 'update user';
    }

}
