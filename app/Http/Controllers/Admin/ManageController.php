<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Product;
use App\Models\Admin\Category;
use App\Models\City;
use App\Models\Client\Menu;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Client;
use App\Models\Admin\Banner;

class ManageController extends Controller
{
    //AllProduct
    public function AllProduct()
    {
        $products = Product::latest()->get();
        return view('admin.backend.product.index', compact('products'));
    }
    //AddProduct
    public function AddProduct()
    {
        $menus = Menu::latest()->get();
        $cities = City::latest()->get();
        $categories = Category::latest()->get();
        $clients = Client::latest()->get();
        return view('admin.backend.product.add', compact('menus', 'cities', 'categories', 'clients'));
    }
    //AddProductStore
    public function AddProductStore(Request $request)
    {
        // login user id
        $user_id = \App\Models\Admin::find(Auth::guard('admin')->id());
        // dd($user);
        $pcode = IdGenerator::generate(['table' => 'products', 'field' => 'a_code', 'length' => 4, 'prefix' => 'PC']);
        // dd($request->all());
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/products/' . $name_gen));
            $save_url = $name_gen;
            //gen Unique ID Code No with Prefix and Suffix Code 4 digit
            Product::create([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'menu_id' => $request->menu_id,
                'category_id' => $request->category_id,
                'city_id' => $request->city_id,
                'a_code' => $pcode,
                'qty' => $request->qty,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'image' => $save_url,
                'description' => $request->description,
                'size' => $request->size,
                'most_popular' => $request->most_popular,
                'best_seller' => $request->best_seller,
                'client_id' => $request->client_id,
                'created_at' => Carbon::now()
            ]);
        }
        // } else {
        //     Product::create([
        //         'name' => $request->name,
        //         'slug' => strtolower(str_replace(' ', '-', $request->name)),
        //         'menu_id' => $request->menu_id,
        //         'category_id' => $request->category_id,
        //         'city_id' => $request->city_id,
        //         'a_code' => $pcode,
        //         'qty' => $request->qty,
        //         'price' => $request->price,
        //         'discount_price' => $request->discount_price,
        //         'description' => $request->description,
        //         'size' => $request->size,
        //         'most_popular' => $request->most_popular,
        //         'best_seller' => $request->best_seller
        //     ]);

        // }
        //Least Inserted Product
        // if Product insert then get id
        $product = Product::latest()->first();
        // dd($product->id);
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.product')->with($notification);
    }
    //UpdateProduct
    public function EditProduct($id)
    {
        $product = Product::find($id);
        $menus = Menu::latest()->get();
        $cities = City::latest()->get();
        $categories = Category::latest()->get();
        $clients = Client::latest()->get();
        return view('admin.backend.product.edit', compact('product', 'menus', 'cities', 'categories', 'clients'));
    }
    //UpdateProduct
    public function UpdateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $user_id = \App\Models\Admin::find(Auth::guard('admin')->id());
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/products/' . $name_gen));
            $save_url = $name_gen;
            Product::find($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'menu_id' => $request->menu_id,
                'category_id' => $request->category_id,
                'city_id' => $request->city_id,
                'a_code' => $request->a_code,
                'qty' => $request->qty,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'image' => $save_url,
                'description' => $request->description,
                'size' => $request->size,
                'most_popular' => $request->most_popular,
                'best_seller' => $request->best_seller,
                'client_id' => $request->client_id,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.product')->with($notification);
        } else {
            Product::find($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'menu_id' => $request->menu_id,
                'category_id' => $request->category_id,
                'city_id' => $request->city_id,
                'a_code' => $request->a_code,
                'qty' => $request->qty,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'size' => $request->size,
                'most_popular' => $request->most_popular,
                'best_seller' => $request->best_seller,
                'client_id' => $request->client_id,
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.product')->with($notification);
        }
    }
    //DeleteProduct
    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        $img = public_path('upload/products/' . $product->image);
        if (file_exists($img)) {
            unlink($img);
        }
        $product->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //Ajax For Product
    public function AdminchangeStatus(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->product_id);
        // dd($product);
        $product->status = $product->status == 'active' ? 'inactive' : 'active';
        $product->save();
        $notification = array(
            'message' => 'Product Status Changed Successfully',
            'alert-type' => 'success'
        );
        return response()->json(['success' => 'Status Change Successfully', 'status' => $product->status], 200);
    }
    //AllRestaurant
    public function AllRestaurant()
    {
        $restaurants = Client::latest()->get();
        return view('admin.backend.restaurant.index', compact('restaurants'));
    }
    //AddRestaurant
    public function AddRestaurant()
    {
        return response()->json(['data' => 'Add Restaurant']);
    }
    //EditRestaurant
    public function EditRestaurant($id)
    {
        return response()->json(['data' => 'Edit Restaurant']);
    }

    //DeleteRestaurant
    public function DeleteRestaurant($id)
    {
        return response()->json(['data' => 'Delete Restaurant']);
    }
    //Ajax For Restaurant
    public function ClientchangeStatus(Request $request)
    {
        // dd($request->all());
        $restaurant = Client::find($request->id);
        // dd($restaurant);
        $restaurant->status = $restaurant->status == 'active' ? 'inactive' : 'active';
        $restaurant->save();
        $notification = array(
            'message' => 'Restaurant Status Changed Successfully',
            'alert-type' => 'success'
        );
        return response()->json(['success' => 'Status Change Successfully', 'status' => $restaurant->status], 200);
    }

    //AllBanner
    public function AllBanner()
    {
        $banners = Banner::latest()->get();
        return view('admin.backend.banner.index', compact('banners'));
    }
    //AddBannerStore
    public function AddBannerStore(Request $request)
    {
        //if request has image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(400, 400)->save(public_path('upload/banners/' . $name_gen));
            $save_url = 'upload/banners/' . $name_gen;
            Banner::insert([
                'url' => $request->url,
                'image' => $save_url,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Banner Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.banner')->with($notification);
        } else {
            Banner::insert([
                'url' => $request->url,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Banner Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.banner')->with($notification);
        }
    }
    //EditBanner
    public function EditBanner($id)
    {
        // dd($id);
        $banner = Banner::find($id);
        if ($banner) {
            $banner->image = asset($banner->image);
        }
        return response()->json($banner);
    }
    //UpdateBanner
    public function UpdateBanner(Request $request)
    {
        $banner = Banner::find($request->banner_id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(400, 400)->save(public_path('upload/banners/' . $name_gen));
            $save_url = 'upload/banners/' . $name_gen;
            $banner->image = $save_url;
        } else {
            $banner->url = $request->url;
        }
        $banner->url = $request->url;
        $banner->save();
        $notification = array(
            'message' => 'Banner Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.banner')->with($notification);
    }
    //DeleteBanner
    public function DeleteBanner($id)
    {
        //find banner
        $banner = Banner::find($id);
        $img = public_path($banner->image);
        if (file_exists($img)) {
            unlink($img);
        }
        $banner->delete();
        $notification = array(
            'message' => 'Banner Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
