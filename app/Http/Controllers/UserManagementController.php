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
        )->paginate(10);

        return view('admin.usermanagement', compact('users'));
    }
}
