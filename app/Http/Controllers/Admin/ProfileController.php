<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create()
    {
        return view('add.profile.create');
    }
    
    public function edit()
    {
         return view('add.profile.create');
    }
    
    public function update()
    {
         return view('add.profile.create');
    }
}
