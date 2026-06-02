<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::where(
            'role',
            'user'
        )->get();

        return view('admin.usermanagement', compact('users'));
    }
}