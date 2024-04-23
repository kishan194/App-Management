<?php

namespace App\Http\Controllers;

use App\Models\ApkUpload;
use App\Models\AppManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class forntendcontroller extends Controller
{
    public function ViewApps(Request $request)
    {
        $searchQuery = $request->input('search');
        
        // Subquery to get the maximum version_name for each app_id
        $subQuery = ApkUpload::select('app_id', DB::raw('MAX(version_name) as max_version'))
                             ->groupBy('app_id');
        
        // Join the subquery with the main query to filter by the maximum version_name
        $query = AppManage::select('app_manages.id', 'app_manages.name', 'app_manages.description', 'app_manages.logo', 'app_manages.image', 'app_manages.PackageName', 'app_manages.publish_status','app_manages.updated_at','apk_uploads.version_name')
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
        return view('frontend.viewlist', compact('app'));
    }
       public function detailsApps(Request $request)
       {
        $searchQuery = $request->input('search');
    
        $query = AppManage::join('apk_uploads', 'app_manages.id', '=', 'apk_uploads.app_id')
                          ->select('app_manages.id','app_manages.name', 'app_manages.description','app_manages.logo','app_manages.image', 'app_manages.PackageName', 'app_manages.publish_status','apk_uploads.app_id' ,'apk_uploads.apk_path', 'apk_uploads.version_name', 'apk_uploads.release_notes');
        
        if ($searchQuery) {
            $query->where('app_manages.name', 'LIKE', "%$searchQuery%");
        }
    
        $apps = $query->get();
        // dd($apps);
          
        return view('frontend.viewdetail', compact('apps'));
        }
}
