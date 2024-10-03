<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $userData = Category::latest()->get();
        return view('admin.backend.category.index', compact('userData'));
    }
}
