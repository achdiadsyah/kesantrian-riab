<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\UserLog;

class AppLogController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = UserLog::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        
        $data = [
            'title' => 'App Log Report',
        ];
        return view('admin.log.index', $data);
    }
}
