<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserDashboard()
    {
        // Fetch all property types
        $types = PropertyType::get(); 
        
        return view('user.index', compact('types'));
    }

}
