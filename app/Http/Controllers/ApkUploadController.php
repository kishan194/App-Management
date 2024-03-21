<?php

namespace App\Http\Controllers;

use App\Models\ApkUpload;
use App\Models\AppManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ApkUploadController extends Controller
{
    public function create(){
        $apk = AppManage::pluck('name', 'id');
        return view('Admin.Apk-upload.create',compact('apk'));
    }
    public function ApkStore(Request $request){
        // dd($request->all());
        $request->validate([
            'app_id' => 'required|exists:app_manages,id',
            'apk_path' => 'required|mimes:apk',
            'version_name' => 'required|string',
            'release_notes' => 'required|string',
        ]);
        $apk_path = time() . '.' . $request->apk_path->extension();
        $request->file('apk_path')->storeAs('apk', $apk_path);
            //$request->apk_path->move(public_path('apk_path'),$apk_path);      
        $apkRelease = new ApkUpload();
        $apkRelease->app_id = $request->app_id;
        $apkRelease->apk_path = $apk_path;
        $apkRelease->version_name =  $request->version_name;
        $apkRelease->release_notes = $request->release_notes;
        // dd($request->all());
        $apkRelease->save();
        return redirect()->route('admin.apk.Index')->withSuccess('Apk Upload SuccessFull...');    
    }
    public function ApkIndex(Request $request){
    $appId = $request->input('filter');
    $searchQuery = $request->input('search');
    $apkQuery = ApkUpload::query()->with('appManage');
    if ($appId) {
        $apkQuery->where('app_id', $appId);
    }
    if ($searchQuery) {
        $apkQuery->whereHas('appManage', function ($query) use ($searchQuery) {
            $query->where('name', 'LIKE', '%' . $searchQuery . '%');
        });
    }
    $filteredApks = $apkQuery->paginate(5);
    $appNames = AppManage::pluck('name', 'id');
    return view('Admin.Apk-upload.index', compact('filteredApks', 'appNames'));

    }

    
public function download($filename)
{
    
    $filePath = storage_path("app/apk/{$filename}");

    if (!file_exists($filePath)) {
           abort(404);
    }
    return response()->download($filePath);
}

public function updateapk($id){
    $apkUpload = ApkUpload::findOrFail($id); 
    $appManage = AppManage::pluck('name', 'id');
    return view('Admin.Apk-upload.update', compact('apkUpload', 'appManage'));
}
public function editapk(Request $request, $id)
{
    $apk = ApkUpload::find($id);

    $request->validate([
        'app_id' => 'required|exists:app_manages,id',
        'apk_path' => 'nullable|mimes:zip',
        'version_name' => 'required|string',
        'release_notes' => 'required|string',
    ]);
    if ($request->hasFile('apk_path')) {
       
        $apk_path = time() . '.' . $request->apk_path->extension();
        $request->file('apk_path')->storeAs('apk', $apk_path);

     
        if ($apk->apk_path) {
            Storage::delete('apk/' . $apk->apk_path);
        }

      
        $apk->apk_path = $apk_path;
    }

  
    $apk->app_id = $request->app_id;
    $apk->version_name = $request->version_name;
    $apk->release_notes = $request->release_notes;

    $apk->save();
    
    return redirect()->route('admin.apk.Index')->withSuccess('Data Update Successful.');
}


    //delete apk
    public function DeleteApk($id){
        $apk = ApkUpload::find($id);
        if(!is_null($apk)){
            $apk->delete();
           }
        return redirect()->route('admin.apk.Index')->withSuccess('Data Delete Successful.');    
      }

      public function singleApk(Request $request, $id)
      {
        $appName = AppManage::pluck('name', 'id');
        $searchQuery = $request->input('search');
    
        if ($searchQuery) {
            $apk = ApkUpload::where('app_id', $id)->paginate(5);
        } else {
            $apk = ApkUpload::where('app_id', $id)->paginate(5);
        }
        
        return view('Admin.Apk-upload.single', compact('apk', 'appName'));
      }
        public function filterApk(Request $request)
         {
        $appId = $request->input('filter');
        $searchQuery = $request->input('search');
        $apkQuery = ApkUpload::query()->with('appManage');
        if ($appId) {
            $apkQuery->where('app_id', $appId);
        }
        if ($searchQuery) {
            $apkQuery->where('name', 'LIKE', '%' . $searchQuery . '%');
        }
        $filteredApks = $apkQuery->paginate(5);
        $appNames = AppManage::pluck('name', 'id');
        return view('Admin.Apk-upload.index', compact('filteredApks', 'appNames'));
        }
     }
    

  