<?php

namespace App\Http\Controllers;

use App\Models\ApkUpload;
use App\Models\AppManage;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function viewApp(){
              $app = AppManage::all();
              return view('User.viewlist',compact('app'));
        }

        public function detailsApp()
{
    $apps = AppManage::join('apk_uploads', 'app_manages.id', '=', 'apk_uploads.app_id')
                    ->select('app_manages.id','app_manages.name', 'app_manages.description','app_manages.logo','app_manages.image', 'app_manages.PackageName', 'app_manages.publish_status','apk_uploads.app_id' ,'apk_uploads.apk_path', 'apk_uploads.version_name', 'apk_uploads.release_notes')                    
                    ->get();


      //   dd($apps);
    return view('User.viewdeatils', compact('apps'));
}
}

