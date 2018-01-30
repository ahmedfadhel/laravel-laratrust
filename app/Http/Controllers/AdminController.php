<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    //
    public function dashboard(){
        $users = User::get();
        return view('manage.dashboard')->withUsers($users);
    }
}
