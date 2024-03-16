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
        
        // $validatedData = $request->validate([
        //     'app_id' => 'required|exists:app_manages,id',
        //     'apk_upload' => 'required|mimes:apk',
        //     'version_name' => 'required|string',
        //     'release_notes' => 'nullable|string',
        // ]);
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
}
