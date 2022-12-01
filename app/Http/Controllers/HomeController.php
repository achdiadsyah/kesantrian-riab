<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user()->user_level == 'super' || auth()->user()->user_level == 'staff') {
            $response = [
                'santri_count'      => [
                    'total_santriwan'       => '',
                    'total_santriwati'      => '',
                    'total_ipa'             => '',
                    'total_mak'             => '',
                    'total_x'               => '',
                    'total_xi'              => '',
                    'total_xii'             => '',
                    'total_active'          => '',
                ],
                'permited_student'  => '',
                'recent_activity'   => ''
            ];
            return view('home');
        } else {
            return view('home-student');
        }
    }

    public function userDetail()
    {
        $data = [
            'title'     => 'User Detail',
            'user'      => User::where('id', auth()->user()->id)->first(),
            'roles'     => Role::all(),
        ];
        return view('account-setting', $data);
    }

    public function updateData(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'          => ['required'],
            'phone'         => ['required', 'numeric', 'min:10'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $update = User::where('id', auth()->user()->id)->update([
            'name'          => $request->name,
            'phone'         => $request->phone,
        ]);

        if($update){
            \UserLog::createLog('Updating user detail');
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

    public function updatePassword(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $update = User::where('id', auth()->user()->id)->update([
            'password'  => Hash::make($request->password),
        ]);

        if($update){
            \UserLog::createLog('Updating and changing account password');
            return redirect()->back()->with([
                'msg'                   => 'Success Update Data',
                'icon'                  => 'success',
                'confirmButtonColor'    => 'success',
            ]);
        }
        return redirect()->back()->with([
            'msg'                   => 'Fail Update Data',
            'icon'                  => 'error',
            'confirmButtonColor'    => 'danger',
        ]);
    }
}
