<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSetting;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request)
    {
        
        if ($request->hasFile('app_logo_light')) {
            
        }

        if ($request->hasFile('app_logo_dark')) {
            
        }

        if ($request->hasFile('school_logo_light')) {
            
        }

        if ($request->hasFile('school_logo_dark')) {
            
        }

        $update =  AppSetting::updateOrCreate(['id' => $request->id],$request->all());

        if($update){
            \UserLog::createLog('Updating App Setting', auth()->user()->id);
            return redirect()->back()->with([
                'msg'                   => 'Success Update Data',
                'icon'                  => 'success',
                'confirmButtonColor'    => 'success',
            ]);
        }
        return redirect()->back()->with([
            'msg'                       => 'Fail Update Data',
            'icon'                      => 'error',
            'confirmButtonColor'        => 'danger',
        ]);
    }
}
