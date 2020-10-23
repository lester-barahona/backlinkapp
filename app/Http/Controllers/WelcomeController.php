<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Domain;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {   
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $domains=Domain::all();
        return view('welcome',compact('categories','subcategories','domains'));
    }
}
