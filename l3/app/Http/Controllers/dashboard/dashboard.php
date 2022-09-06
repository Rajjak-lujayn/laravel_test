<?php

namespace App\Http\Controllers\dashboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    function dashboard(){
        $user = User::all();
        return view('dashboard', compact('user'));
    }
}
