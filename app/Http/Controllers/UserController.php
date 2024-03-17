<?php

namespace App\Http\Controllers;

use App\Models\AppManage;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function viewApp(){
              $app = AppManage::all();
              return view('User.viewlist',compact('app'));
        }

        public function detailsApp(){
               return view('User.viewdeatils');
        }
}
