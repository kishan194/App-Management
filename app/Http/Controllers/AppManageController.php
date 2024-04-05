<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator; 
use App\Models\AppManage;
use Illuminate\Http\Request;

class AppManageController extends Controller
{

  public function upload(Request $request)
  {
      if ($request->hasFile('upload')) {
          $originName = $request->file('upload')->getClientOriginalName();
          $fileName = pathinfo($originName, PATHINFO_FILENAME);
          $extension = $request->file('upload')->getClientOriginalExtension();
          $fileName = $fileName . '_' . time() . '.' . $extension;
          $request->file('upload')->move(public_path('media'), $fileName);
          $CKEditorFuncNum = $request->input('CKEditorFuncNum');
  
          $url = asset('media/' .$fileName);
          $msg = "Image uploaded successfully";
  
          $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
          @header('Content-type: text/html; charset=utf-8');
          echo $response;
      }
  
      // Handle case when no file is uploaded
      return "<script>window.parent.CKEDITOR.tools.callFunction('1', '', 'No file uploaded.');</script>";
  }
  public function index(Request $request)
  {
      $searchQuery = $request->input('search');

      if ($searchQuery) {
          $app = AppManage::where('name', 'LIKE', "%$searchQuery%")
                           ->paginate(5);
      } else {
          $app = AppManage::paginate(5);
      }
        return view('Admin.App-Management.index',compact('app'));
    }
      Public function create(){
        return view('Admin.App-Management.create');
      }

      public function AppStore(Request $request){
        
          $request->validate([
          'name' => 'required',
          'description' => 'required',
          'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
          'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=300,height=300', 
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
             return redirect()->route('admin.App.index')->withSuccess('Data Added Successful.');    
             
      }
      public function updateapp($id){
        $app = AppManage::where('id',$id)->find($id);
      
        return view('Admin.App-Management.UpdateApp',['data' => $app]);
      }

      public function editApp(Request $request, $id)
      {
        $request->validate([
          'name' => 'required',
          'description' => 'required',
          'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
          'image' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=300,max_height=300',
          'PackageName' => 'required',
          'meta_keywords' => 'nullable',
          'meta_description' => 'nullable',
          'publish_status' => 'required|in:published,unpublished',  
          
      ]);
          
          $app = AppManage::find($id);
      
          if ($request->hasFile('logo')) {
              $logo = time() . '.' . $request->logo->extension();
              $request->logo->move(public_path('logo'), $logo);
              $app->logo = $logo;
          }
      
         
          if ($request->hasFile('image')) {
              $image = time() . '.' . $request->image->extension();
              $request->image->move(public_path('images'), $image);
              $app->image = $image;
          }
          $app->name = $request->name;
          $app->description = $request->description;
          $app->PackageName = $request->PackageName;
          $app->meta_keywords = $request->meta_keywords;
          $app->meta_description = $request->meta_description;
          $app->publish_status = $request->publish_status;
          $app->save();
      
          return redirect()->route('admin.App.index')->withSuccess('Data Update Successful.');    
          }

          public function DeleteApp($id){
            $app = AppManage::find($id);
            if(!is_null($app)){
             $app->delete();
            }
            return redirect()->route('admin.App.index')->withSuccess('Data Delete Successful.');    

          }
        
        

      }

