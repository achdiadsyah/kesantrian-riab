<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Village;

class WilayahController extends Controller
{
    public function getProvince(Request $request)
    {
        if($request->id){
            $data = Province::where('id', $request->id)->first();
        } else {
            $data = Province::all();
        }
        return response([
            'status'        => 'success',
            'country_name'  => 'INDONESIA',
            'country_code'  => 'IDN',
            'phone_code'    => '+62',
            'flag_waving'   => 'https://flagcdn.com/256x192/id.png',
            'flag_width'    => 'https://flagcdn.com/w160/id.png',
            'flag_height'   => 'https://flagcdn.com/h160/id.png',
            'data'          => $data,
        ]);
    }

    public function getCity(Request $request)
    {
        if($request->id){
            $data = City::where('id', $request->id)->first();
        } else {
            $data = City::where('province_id', $request->province_id)->get();
        }
        return response([
            'status'    => 'success',
            'data'      => $data,
        ]);
    }

    public function getDistrict(Request $request)
    {
        if($request->id){
            $data = District::where('id', $request->id)->first();
        } else {
            $data = District::where('city_id', $request->city_id)->get();
        }
        return response([
            'status'    => 'success',
            'data'      => $data,
        ]);
    }

    public function getVillage(Request $request)
    {
        if($request->id){
            $data = Village::where('id', $request->id)->first();
        } else {
            $data = Village::where('district_id', $request->district_id)->get();
        }
        return response([
            'status'    => 'success',
            'data'      => $data,
        ]);
    }
}
