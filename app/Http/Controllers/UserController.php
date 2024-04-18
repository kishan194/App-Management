<?php

namespace App\Http\Controllers;

use App\Models\ApkUpload;
use App\Models\AppManage;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function home(){
            $app = AppManage::all();
            return view('welcome',compact('app'));
    }
  public function viewApp(Request $request)
  {
      $searchQuery = $request->input('search');
  
      $query = AppManage::query();
  
      if ($searchQuery) {
          $query->where('name', 'LIKE', "%$searchQuery%");
      }
   
      $app = $query->get();
              return view('User.viewlist',compact('app'));
  }

// public function viewApp()
// {
//     // Retrieve all records from the AppManage and ApkUpload models
//     $app = AppManage::all();
//     $apk = ApkUpload::all();

//     // Merge the collections retrieved from both models
//     $mergedData = $app->merge($apk);

//     // Pass the merged data to the view
//     return view('User.viewlist', compact('mergedData'));
// }


// public function viewApp(Request $request)
//     {
//         // Fetch data from the 'AppManage' model
//         $appManageData = AppManage::select('id', 'name', 'logo', 'updated_at')->get();

//         // Fetch data from the 'ApkUpload' model
//         $apkUploadData = ApkUpload::select('app_id', 'version_name')->get();

//         // Merge the collections from both models
//         $mergedData = $appManageData->merge($apkUploadData);

//         // Pass the merged data to the view
//         return view('User.viewlist', compact('mergedData'));
//     }

// public function viewApp(Request $request)
// {
//     $searchQuery = $request->input('search');

//     // Query the AppManage model with search functionality
//     $query = AppManage::query();

//     if ($searchQuery) {
//         $query->where('name', 'LIKE', "%$searchQuery%");
//     }

//     // Fetch filtered records from the AppManage model
//     $apps = $query->get();

//     // Fetch all records from the 'apk-uploads' module without filtering
//     $allApps = ApkUpload::all();

//     // Pass the retrieved records to the view
//     return view('User.viewlist', compact('apps', 'allApps'));
// }

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

    public function download($filename)
    {
    
    $filePath = storage_path("app/apk/{$filename}");

    if (!file_exists($filePath)) {
           abort(404);
    }
    return response()->download($filePath);
    }
}

