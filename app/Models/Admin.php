<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guard = 'admin';
    protected $guarded = [];
    protected $guard_name = 'admin';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getPermissionsGroup(){
        $permition_group = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permition_group;
    }
    public static function getPermissionsByGroupName($group_name){
        $permitions = DB::table('permissions')->select('id','name')->where('group_name',$group_name)->get();
        return $permitions;
    }
    public static function roleHasPermition($role, $permissions){
        // dd($role, $permissions);
            $hasPermission = true;
            foreach ($permissions as $key => $permission) {
               if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
               }
            //    dd($hasPermission);
               return $hasPermission;
            }
    }
}
