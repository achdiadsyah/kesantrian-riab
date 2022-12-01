<?php

namespace App\Helpers;
use App\Models\UserLog as UserLogModel;
use Request;

class UserLog
{

    public static function createLog($description, $user_id = null)
    {
        $log = [];
    	$log['description'] = $description;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : $user_id;
        return UserLogModel::create($log);
    }


    public static function showLog($limit)
    {
        return UserLogModel::latest()->with('user')->limit($limit)->get();
    }
}

?>