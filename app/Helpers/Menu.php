<?php 
namespace App\Helpers;
use App\Models\MenuList;

class Menu
{

    public static function getMenu()
    {

        if(auth()->user()->user_level == 'super') {
            return MenuList::with('child')->where(['is_active' => '1', 'parent_id' => NULL])->orderBy('order', 'asc')->get();
        } else if(auth()->user()->user_level == 'staff'){
            return MenuList::with('child')->where(['is_active' => '1', 'parent_id' => NULL, 'user_level' => 'staff'])->orderBy('order', 'asc')->get();
        } else if(auth()->user()->user_level == 'student'){
            return MenuList::with('child')->where(['is_active' => '1', 'parent_id' => NULL, 'user_level' => 'student'])->orderBy('order', 'asc')->get();
        } else if(auth()->user()->user_level == 'parent'){
            return MenuList::with('child')->where(['is_active' => '1', 'parent_id' => NULL, 'user_level' => 'parent'])->orderBy('order', 'asc')->get();
        }
    }

}