<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPageController extends Controller
{

    public function userAdminDashboard(){
        return view('userAdmin.layouts.app');
    }
}
