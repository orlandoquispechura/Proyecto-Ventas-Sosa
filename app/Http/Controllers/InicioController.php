<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        
        $users = User::all();
        return view('home.inicio', compact('users'));
    }
}
