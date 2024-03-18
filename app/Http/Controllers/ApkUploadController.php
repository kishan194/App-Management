<?php

namespace App\Http\Controllers;

use App\Models\ApkUpload;
use App\Models\AppManage;
use Illuminate\Http\Request;

class ApkUploadController extends Controller
{
    public function create(){
        $apk = AppManage::pluck('name', 'id');
        return view('Admin.Apk-upload.create',compact('apk'));
    }
    public function ApkStore(Request $request){
        
        $request->validate([
            'app_id' => 'required|exists:app_manages,id',
            'apk_upload' => 'required|mimes:apk|max:64000',
            'version_name' => 'required|string',
            'release_notes' => 'required|string',
        ]);
        $apk_path = time(). '.' .$request->apk_path->extension();
        $request->apk_path->move(public_path('apk_path'),$apk_path);      
        $apkRelease = new ApkUpload();
        $apkRelease->app_id = $request->app_id;
        $apkRelease->apk_path = $apk_path;
        $apkRelease->version_name =  $request->version_name;
        $apkRelease->release_notes = $request->release_notes;
        // dd($request->all());
        $apkRelease->save();
        return redirect()->route('admin.apk.create')->with('success', 'APK release created successfully.');
    }
    public function ApkIndex(){
               $apk = ApkUpload::all();
               return view('Admin.Apk-upload.index',compact('apk'));

    }

    
public function download($filename)
{
    
    $filePath = public_path("apk_path/{$filename}");

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
public function editapk(Request $request , $id){
    $apk = ApkUpload::find($id);
      
    $request->validate([
        'app_id' => 'required|exists:app_manages,id',
        'apk_upload' => 'required|mimes:apk',
        'version_name' => 'required|string',
        'release_notes' => 'required|string',
    ]);


    if ($request->hasFile('apk_path')) {
        $apk_path = time() . '.' . $request->apk_path->extension();
        $request->apk_path->move(public_path('apk_path'), $apk_path);
    }
    $apk->app_id = $request->app_id;
    $apk->apk_path = $request->apk_path;
    $apk->apk_path= $apk_path;
    $apk->version_name = $request->version_name;
    $apk->release_notes = $request->release_notes;
    $apk->save();
    return redirect()->route('admin.apk.Index')->withSuccess('Data Update Successful.');    
    }

    public function DeleteApk($id){
        $apk = ApkUpload::find($id);
        if(!is_null($apk)){
            $apk->delete();
           }
        return redirect()->route('admin.apk.Index')->withSuccess('Data Delete Successful.');    

      }

}
