<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Classroom;
use App\Models\User;
use DataTables;

class ClassroomController extends Controller
{

    public function __construct()
    {
        $this->staffList =  User::where(['user_level' => 'staff', 'is_active' => '1'])->get();
    }

    public function index(Request $request)
    {
        
        if($request->ajax()){
            $query = Classroom::with('head');
            return Datatables::of($query)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
        } else {
            return view('master.classroom.list');
        }
    }

    public function create(Request $request)
    {
        $data = [
            'staff_list'    => $this->staffList
        ];
        return view('master.classroom.create', $data);
    }

    
    public function edit(Classroom $classroom_id)
    {
        $data = [
            'classroom_id'  => $classroom_id,
            'staff_list'    => $this->staffList,
            
        ];
        return view('master.classroom.edit', $data);
    }
    
    public function store(Request $request)
    {
        // $validated = Validator::make($request->all(), [
        //     'name'          => ['required', 'unique:classrooms'],
        //     'focus'         => ['required'],
        //     'grade'         => ['required'],
        //     'limitation'    => ['required'],
        //     'head_id'       => ['required'],
        // ]);

        // if ($validated->fails()) {
        //     return redirect()->back()->withErrors($validated)->withInput();
        // }

        // if(!empty($request->classroom_id)){
        //     $action = Classroom::create([
        //         'name'          => $request->name,
        //         'focus'         => $request->focus,
        //         'grade'         => $request->grade,
        //         'limtation'     => $request->limtation,
        //         'head_id'       => $request->head_id,
        //     ]);
        // } else {
        //     $action = Classroom::where('id', $request->classroom_id)
        //     ->update([
        //         'name'          => $request->name,
        //         'focus'         => $request->focus,
        //         'grade'         => $request->grade,
        //         'limtation'     => $request->limtation,
        //         'head_id'       => $request->head_id,
        //     ]);

        //     \UserLog::createLog('Create a new user');
        // }

        // if($action){
            
        //     return redirect()->back()->with([
        //         'msg'                   => 'Success Create Data',
        //         'icon'                  => 'success',
        //         'confirmButtonColor'    => 'success',
        //     ]);
        // }
        // return redirect()->back()->with([
        //     'msg'                       => 'Fail Create Data',
        //     'icon'                      => 'error',
        //     'confirmButtonColor'        => 'danger',
        // ]);
    }

    public function destroy($id)
    {
        //
    }
}
