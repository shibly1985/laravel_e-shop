<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function manageUser() {
        //$users = User::all();
        //$users = User::simplePaginate(20);
        $users = User::paginate(20);
        return view('admin.home.user.manageUsers',['data' => $users]);
    }
}
