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
          // Fetch the existing record from the database
          $app = AppManage::find($id);
      
          if (!$app) {
              return back()->withErrors('App not found.');
          }
      
          // Handle logo update
          if ($request->hasFile('logo')) {
              $logo = time() . '.' . $request->logo->extension();
              $request->logo->move(public_path('logo'), $logo);
              $app->logo = $logo;
          }
      
          // Handle image update
          if ($request->hasFile('image')) {
              $image = time() . '.' . $request->image->extension();
              $request->image->move(public_path('images'), $image);
              $app->image = $image;
          }
      
          // Update other fields
          $app->name = $request->name;
          $app->description = $request->description;
          $app->PackageName = $request->PackageName;
          $app->meta_keywords = $request->meta_keywords;
          $app->meta_description = $request->meta_description;
          $app->publish_status = $request->publish_status;
      
          // Save the changes
          $app->save();
      
          return redirect()->route('admin.App.index')->withSuccess('Data Update Successful.');    
          }
        
        

      }

