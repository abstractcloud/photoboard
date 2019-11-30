<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $users =  User::where('name', 'LIKE', "{$request->get('search')}%")->get();
        
        return view('users.index', [
            'users' => $users
        ]);
    }
}
