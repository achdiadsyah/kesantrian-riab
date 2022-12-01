<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MenuList;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = MenuList::where('is_parent', '1')->with('child')->get();
            return response()->json($data, 200);
        }
        
        $data = [
            'title' => 'Menu Management',
            'parentMenu'    => MenuList::where('is_parent', '1')->get(),
        ];
        return view('admin.menu.index', $data);
    }
    
    public function updateSequence(Request $request)
    {
        $input= $request['data'];
        $no = 0;
        $seq_no = 0;
        foreach ($input as $key) {
            $id = $key['id'];
            $parent_id = isset($key['parent_id']) ? $key['parent_id'] : NULL;

            if ($parent_id != 0) {
                $no++;
            } else {
                $no = 0;
                $seq_no++;
            }

            $sequence = $parent_id == NULL ? $seq_no : $key['parent_order'] . '.' . $no;
            $is_parent = $parent_id == NULL ? '1' : '0';

            MenuList::where('id', $id)->update([
                'parent_id' => $parent_id,
                'order'     => $sequence,
                'is_parent' => $is_parent
            ]);
        }
        return response()->json(['success' => true], 200);
    }

    public function setAccess (MenuList $id)
    {
        $data = [
            'title'     => 'Menu Management',
            'menuData'  => $id,
        ];
        return view('admin.menu.detail', $data);
    }

    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'          => ['required'],
            'route'         => ['required'],
            'favicon'       => ['required'],
            'description'   => ['required'],
            'parent_id'     => ['required_if:is_parent,0'],
            'is_parent'     => ['required'],
            'is_active'     => ['required'],
            'user_level'    => ['required'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $create = MenuList::create([
            'name'          => $request->name,
            'alias'         => Str::slug($request->name, '-'),
            'route'         => $request->route,
            'favicon'       => $request->favicon,
            'description'   => $request->description,
            'parent_id'     => $request->parent_id,
            'is_parent'     => $request->is_parent,
            'is_active'     => $request->is_active,
            'user_level'    => $request->user_level,
            'order'         => '0',
        ]);

        if($create){
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

}
