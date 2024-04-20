<?php

namespace App\Http\Controllers;

use App\Models\ApkUpload;
use App\Models\AppManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function home(){
            $app = AppManage::all();
            return view('welcome',compact('app'));
    }


   public function viewApp(Request $request)
{
    $searchQuery = $request->input('search');
    
    // Subquery to get the maximum version_name for each app_id
    $subQuery = ApkUpload::select('app_id', DB::raw('MAX(version_name) as max_version'))
                         ->groupBy('app_id');
    
    // Join the subquery with the main query to filter by the maximum version_name
    $query = AppManage::select('app_manages.id', 'app_manages.name', 'app_manages.description', 'app_manages.logo', 'app_manages.image', 'app_manages.PackageName', 'app_manages.publish_status','apk_uploads.version_name','apk_uploads.updated_at')
                      ->join('apk_uploads', function($join) {
                          $join->on('app_manages.id', '=', 'apk_uploads.app_id');
                      })
                      ->joinSub($subQuery, 'sub', function($join) {
                          $join->on('app_manages.id', '=', 'sub.app_id')
                               ->on('apk_uploads.version_name', '=', 'sub.max_version');
                      });
    
    // If there's a search query, filter the results
    if ($searchQuery) {
        $query->where('app_manages.name', 'LIKE', "%$searchQuery%");
    }
    
    // Fetch the data
    $app = $query->get();
    
    // Pass the data to the view
    return view('User.viewlist', compact('app'));
}

    

// public function viewApp(){

//     $app  = AppManage::select('app_manages.id', 'app_manages.name', 'app_manages.description', 'app_manages.logo', 'app_manages.image', 'app_manages.PackageName', 'app_manages.publish_status', 'apk_uploads.version_name')
//       ->leftJoin('apk_uploads', 'app_manages.id', '=', 'apk_uploads.app_id');

//       return view('User.viewlist',compact('app'));
// }



// public function viewApp(){
//     $app = AppManage::all();
//     return view('User.viewlist',compact('app'));
// }




// public function viewApp()
// {
//     $app = Appmanage::with('apkUpload')->get();
//     return view('User.viewlist', compact('app'));
// }

// public function viewApp()
// {
//     // Retrieve all AppManage records with their associated ApkUpload data
//     $app = AppManage::with('apkUpload')->get();

//     // Pass the data to the view
//     return view('User.viewlist', compact('app'));
// }

// public function viewApp(Request $request)
//     {
//         // Fetch data from the 'AppManage' model
//         $appManageData = AppManage::select('id', 'name', 'logo', 'updated_at')->get();

//         // Fetch data from the 'ApkUpload' model
//         $apkUploadData = ApkUpload::select('app_id', 'version_name')->get();

//         // Merge the collections from both models
//         $mergedData = $appManageData->concat($apkUploadData);

//          // Pass the merged data to the view
//        return view('User.viewlist', compact('mergedData'));
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

