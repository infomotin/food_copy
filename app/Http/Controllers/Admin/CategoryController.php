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

        // dd($request->all());

        // $request->validate([
        //     'category_name_en' => 'required',
        //     'category_name_hin' => 'required',
        //     'image' => 'required',
        // ]);
        // get old category image and delete
        $old_category_photo_path = $request->image;
        if($old_category_photo_path && file_exists('upload/category/'.$old_category_photo_path)){
            $this->deleteOldImage($old_category_photo_path);
        }

        // image file upload
        $category_photo_path = [];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/category/',$filename);
            $category_photo_path = $filename;
        }
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = $request->slug;
        $category->image = $category_photo_path;
        $category->save();
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // EditCategory
    public function EditCategory($id){
        $category = Category::find($id);
        return view('admin.backend.category.edit', compact('category'));
    }

    // UpdateCategory
    public function UpdateCategory(Request $request, $id){
        $category = Category::find($id);
        // get old category image and delete
        $old_category_photo_path = $request->image;
        if($old_category_photo_path && file_exists('upload/category/'.$old_category_photo_path)){
            $this->deleteOldImage($old_category_photo_path);
        }
        // image file upload
        $category_photo_path = [];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/category/',$filename);
            $category_photo_path = $filename;
        }
        $category->category_name = $request->category_name;
        $category->slug = $request->slug;
        $category->image = $category_photo_path;
        $category->save();
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    // DeleteCategory
    public function DeleteCategory($id){
        $category = Category::find($id);
        $old_category_photo_path = $category->image;
        if($old_category_photo_path && file_exists('upload/category/'.$old_category_photo_path)){
            $this->deleteOldImage($old_category_photo_path);
        }
        $category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteOldImage( string $old_profile_photo_path): void{
        $fullpath = public_path('upload/category/'.$old_profile_photo_path);
        if($old_profile_photo_path && file_exists('upload/category/'.$old_profile_photo_path)){
            unlink($fullpath);
        }
    }
}
