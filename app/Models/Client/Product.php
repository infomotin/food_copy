<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Client\Menu;
use App\Models\City;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    //Menu
    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
    // City
    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
