<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
}
