<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use League\Flysystem\Filesystem;
use League\Flysystem\ZipArchive\ZipArchiveAdapter;
use App\Models\User;

class BucketController extends Controller
{
    public function showFile(Request $request)
    {
        if (Storage::disk('s3')->exists($request->folders.'/'.$request->filename)) {
            $mimeType = Storage::disk('s3')->mimeType($request->folders.'/'.$request->filename);
            $headers = [
                'Content-Type'        => $mimeType,
            ];
            return response()->make(Storage::disk('s3')->get($request->folders.'/'.$request->filename),200,$headers);
        }else{
            abort('404');
        }
    }

    public function upload(Request $request)
    {
        // Make Validation Here
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
            'path'  => 'required',
        ]);

        if($request->validate()->fails()){
            return response()->json([
                'status'        => 'error',
                'messagae'      => $request,
            ]);
        }

        $uploadPath = 'kesantrian/'.auth()->user()->user_level.'/'.auth()->user()->id;
        $fileName = $request->path.'-'.uniqid()."-".$request->file->getClientOriginalName();
        $action = Storage::disk('s3')->put($uploadPath.'/'.$fileName, file_get_contents($request->file));

        if($action){
            return response()->json([
                'status'       => 'success',
                'file_name'     => $fileName,
                'file_category' => $request->path,
                'file_path'     => $uploadPath.'/'.$fileName,
                'file_url'      => route('fileS3')."?folders=".$uploadPath."&filename=".$fileName,
            ]);
        } else {
            return response()->json([
                'status'    => 'error',
                'messagae'    => $action,
            ]);
        }
    }

    public function delete()
    {
        
    }

    public function archive(User $id)
    {
        $source_path = 'kesantrian/'.$id;
    }
}
