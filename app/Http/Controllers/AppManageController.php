<?php

namespace App\Http\Controllers;

use App\Models\AppManage;
use Illuminate\Http\Request;

class AppManageController extends Controller
{

    public function index(){
        $app = AppManage::all();
        return view('Admin.App-Management.index',compact('app'));
    }
      Public function create(){
        return view('Admin.App-Management.create');
      }

      public function AppStore(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', 
            'PackageName' => 'required',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'publish_status' => 'required|in:published,unpublished',
        ]);
        $logo = time(). '.' .$request->logo->extension();
        $request->logo->move(public_path('logo'),$logo);
        $image = time(). '.' .$request->image->extension();
        $request->image->move(public_path('images'),$image);
             $app = new AppManage();
             $app->name = $request->name;
             $app->description = $request->description;
             $app->logo = $logo;
             $app->image = $image;
             $app->PackageName = $request->PackageName;
             $app->meta_keywords = $request->meta_keywords;
             $app->meta_description = $request->meta_description;
             $app->publish_status = $request->publish_status;
             $app->save();
             return back()->withSuccess('App Added');   
      }
      public function updateapp($id){
        $app = AppManage::where('id',$id)->find($id);
      
        return view('Admin.App-Management.UpdateApp',['data' => $app]);
      }

      public function editApp(Request $request, $id)
      {

        $app = AppManage::where('id',$id)->first();
       

          $logo = time(). '.' .$request->logo->extension();
          $request->logo->move(public_path('products'),$logo);
      
          $image = time(). '.' .$request->image->extension();
          $request->image->move(public_path('products'),$image);

          $app = new AppManage();
          $app->name = $request->name;
          $app->description = $request->description;
          $app->logo = $logo;
          $app->image = $image;
          $app->PackageName = $request->PackageName;
          $app->meta_keywords = $request->meta_keywords;
          $app->meta_description = $request->meta_description;
          $app->publish_status = $request->publish_status;
          dd($request->all());
          $app->save();
          return back()->withSuccess('App Added');  
          
        
        

      }
}
