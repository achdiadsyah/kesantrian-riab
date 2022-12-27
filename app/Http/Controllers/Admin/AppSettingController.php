<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSetting;

class AppSettingController extends Controller
{
    public function index(Request $request)
    {   
        $data = [
            'title'     => 'App Setting',
            'app_data'  => AppSetting::where('id', 1)->first(),
        ];
        return view('admin.app-setting.index', $data);
    }
}
