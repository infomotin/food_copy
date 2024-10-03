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

    // AddCategory
    public function AddCategory(){
        return view('admin.backend.category.add');
    }
    // StoreCategory
    public function AddCategoryStore(Request $request)
    {

        dd($request->all());

        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',
        ]);
        $category = new Category();
        $category->category_name_en = $request->category_name_en;
        $category->category_name_hin = $request->category_name_hin;
        $category->category_icon = $request->category_icon;
        $category->save();
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
