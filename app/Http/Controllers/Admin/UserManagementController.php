<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\StaffDetail;
use DataTables;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        
        $data = [
            'title' => 'User List',
            'roles' => Role::all(),
        ];
        return view('admin.user.index', $data);
    }

    public function detail(User $id)
    {
        $data = [
            'title'     => 'User Detail',
            'user'      => $id,
            'roles'     => Role::all(),
        ];
        return view('admin.user.detail', $data);
    }

    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'                  => ['required'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8'],
            'user_level'            => ['required'],
            'role_id'               => ['required'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $create = User::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'password'              => Hash::make($request->password),
            'user_level'            => $request->user_level,
            'role_id'               => $request->role_id,
            'created_by'            => auth()->user()->id,               
        ]);

        if($request->user_level == "staff" OR $request->user_level == "super"){
            StaffDetail::create([
                'user_id'   => $create->id,
            ]);
        }

        if($create){
            \UserLog::createLog('Create a new user', auth()->user()->id);
            return redirect()->back()->with([
                'msg'                   => 'Success Create Data',
                'icon'                  => 'success',
                'confirmButtonColor'    => 'success',
            ]);
        }
        return redirect()->back()->with([
            'msg'                       => 'Fail Create Data',
            'icon'                      => 'error',
            'confirmButtonColor'        => 'danger',
        ]);
    }

    public function update(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'                  => ['required'],
            'user_level'            => ['required'],
            'role_id'               => ['required'],
            'is_active'             => ['required'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $update = User::where('id', $request->id)->update([
            'name'          => $request->name,
            'user_level'    => $request->user_level,
            'role_id'       => $request->role_id,
            'is_active'     => $request->is_active,
        ]);

        if($update){
            \UserLog::createLog('Updating user detail', auth()->user()->id);
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

        $update = User::where('id', $request->id)->update([
            'password'  => Hash::make($request->password),
        ]);

        if($update){
            \UserLog::createLog('Updating and changing other account password', auth()->user()->id);
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

    public function destroy(Request $request)
    {
        $find = User::where('id', $request->id)->first();

        if($find) {
            if($find->user_level == "super") {
                return redirect()->back()->with([
                    'msg'                   => 'Restricted to delete',
                    'icon'                  => 'error',
                    'confirmButtonColor'    => 'danger',
                ]);
            }
    
            if($find->user_level == "staff") {
                StaffDetail::where('user_id', $request->id)->delete();
                User::where('id', $request->id)->delete();
                \UserLog::createLog('Deleting user account', auth()->user()->id);
                return redirect()->back()->with([
                    'msg'                   => 'Success Delete Data',
                    'icon'                  => 'success',
                    'confirmButtonColor'    => 'success',
                ]);
            }
    
            if($find->user_level == "student") {
                // StudentDetail::where('user_id', $request->id)->delete();
                // User::where('id', $request->id)->delete();
                // \UserLog::createLog('Deleting user account', auth()->user()->id);
                // return redirect()->back()->with([
                //     'msg'                   => 'Success Delete Data',
                //     'icon'                  => 'success',
                //     'confirmButtonColor'    => 'success',
                // ]);
            }
    
            if($find->user_level == "parent") {
                // ParentDetail::where('user_id', $request->id)->delete();
                // User::where('id', $request->id)->delete();
                // \UserLog::createLog('Deleting user account', auth()->user()->id);
                // return redirect()->back()->with([
                //     'msg'                   => 'Success Delete Data',
                //     'icon'                  => 'success',
                //     'confirmButtonColor'    => 'success',
                // ]);
            }
        }

        return redirect()->back()->with([
            'msg'                   => 'User id not found',
            'icon'                  => 'error',
            'confirmButtonColor'    => 'danger',
        ]);

    }
}
