<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Menu;
use App\Models\Client\Product;
use App\Models\Admin\Category;
use App\Models\City;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    // AllRestaurant

    public function AllMenu()
    {
        $menus = Menu::latest()->get();
        return view('client.backend.menu.index', compact('menus'));
    }
    //ClientMenuAdd
    public function ClientMenuAdd()
    {
        return view('client.backend.menu.add');
    }

    //ClientMenuStore
    public function ClientMenuStore(Request $request)
    {
        if ($request->file('menu_icon')) {
            $image = $request->file('menu_icon');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('upload/menus/'.$name_gen));
            $save_url = $name_gen;

            Menu::create([
                'menu_name' => $request->menu_name,
                'menu_slug' => $request->menu_slug,
                'menu_icon' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Menu Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.menu')->with($notification);
    }
    //ClientMenuEdit
    public function ClientMenuEdit($id)
    {
        $menu = Menu::find($id);
        return view('client.backend.menu.edit', compact('menu'));
    }
    //ClientMenuUpdate
    public function ClientMenuUpdate(Request $request, $id)
    {
        if ($request->file('menu_icon')) {
            $image = $request->file('menu_icon');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('upload/menus/'.$name_gen));
            $save_url = $name_gen;

            Menu::find($id)->update([
                'menu_name' => $request->menu_name,
                'menu_slug' => $request->menu_slug,
                'menu_icon' => $save_url,
            ]);

            $notification = array(
                'message' => 'Menu Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.menu')->with($notification);
        } else {
            Menu::find($id)->update([
                'menu_name' => $request->menu_name,
                'menu_slug' => $request->menu_slug,
            ]);

            $notification = array(
                'message' => 'Menu Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.menu')->with($notification);
        }
    }
    // ClientMenuDelete
    public function ClientMenuDelete($id)
    {
        $menu = Menu::find($id);
        $img = public_path('upload/menus/'.$menu->menu_icon);
        if (file_exists($img)) {
            unlink($img);
        }
        $menu->delete();
        $notification = array(
            'message' => 'Menu Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //All Function for Product
    // Show all product to index page
    public function ClientProductAll()
    {
        $products = Product::latest()->get();
        $menus = Menu::latest()->get();
        return view('client.backend.product.index', compact('products', 'menus'));
    }
    //ClientProductAdd
    public function ClientProductAdd()
    {
        $menus = Menu::latest()->get();
        $cities = City::latest()->get();
        $categories = Category::latest()->get();
        return view('client.backend.product.add', compact('menus', 'cities', 'categories'));
        // return view('client.backend.product.add');
    }
    //ClientProductStore
    public function ClientProductStore(Request $request)
    {

        // login user id
        $user_id = \App\Models\Client::find(Auth::guard('client')->id());
        // dd($user);
        $pcode = IdGenerator::generate(['table' => 'products', 'field' => 'a_code', 'length' => 4, 'prefix' => 'PC']);
        // dd($request->all());
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('upload/products/'.$name_gen));
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
                'client_id' => $user_id->id
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
        return redirect()->route('client.product.all')->with($notification);
    }
}
