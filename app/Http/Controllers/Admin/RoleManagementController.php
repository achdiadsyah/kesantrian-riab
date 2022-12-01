<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Illuminate\Support\Str;
use DataTables;

class RoleManagementController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Role::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        
        $data = [
            'title' => 'Role Management',
        ];
        return view('admin.role.index', $data);
    }

    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'  => ['required'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $create = Role::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name, '-')
        ]);

        if($create){
            \UserLog::createLog('Create a new role', auth()->user()->id);
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

    public function detail(Role $id)
    {
        $data = [
            'title'     => 'Role Detail',
            'role'      => $id,
        ];
        return view('admin.role.detail', $data);
    }

    public function update(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'                  => ['required'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $update = Role::where('id', $request->id)->update([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name, '-'),
        ]);

        if($update){
            \UserLog::createLog('Updating role detail', auth()->user()->id);
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

    public function destroy(Request $request)
    {
        $find = Role::where('id', $request->id)->first();
        if($find){
            Role::where('id', $request->id)->delete();
            \UserLog::createLog('Deleting a role from role list', auth()->user()->id);
            return redirect()->back()->with([
                'msg'                   => 'Success Create Data',
                'icon'                  => 'success',
                'confirmButtonColor'    => 'success',
            ]);
        }
        return redirect()->back()->with([
            'msg'                       => 'Role not found',
            'icon'                      => 'error',
            'confirmButtonColor'        => 'danger',
        ]);
    }
}
