<?php

namespace App\Http\Controllers;

use App\Models\ApkUpload;
use App\Models\AppManage;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function viewApp(Request $request)
  {
      $searchQuery = $request->input('search');
  
      $query = AppManage::query();
  
      if ($searchQuery) {
          $query->where('name', 'LIKE', "%$searchQuery%");
      }
  
      $app = $query->paginate(5);
              return view('User.viewlist',compact('app'));
        }

   public function detailsApp(Request $request)
   {
    $searchQuery = $request->input('search');

    $query = AppManage::join('apk_uploads', 'app_manages.id', '=', 'apk_uploads.app_id')
                      ->select('app_manages.id','app_manages.name', 'app_manages.description','app_manages.logo','app_manages.image', 'app_manages.PackageName', 'app_manages.publish_status','apk_uploads.app_id' ,'apk_uploads.apk_path', 'apk_uploads.version_name', 'apk_uploads.release_notes');
    
    if ($searchQuery) {
        $query->where('app_manages.name', 'LIKE', "%$searchQuery%");
    }

    $apps = $query->get();
    // dd($apps);
      
    return view('User.viewdeatils', compact('apps'));
    }
}

