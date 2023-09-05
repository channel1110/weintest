<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ListController extends Controller
{ 
    public function index()
    {
        $users = User::all(); 
        return view('list.index', ['users' => User::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

}


 

