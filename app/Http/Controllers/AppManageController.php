<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppManageController extends Controller
{
      Public function create(){
        return view('Admin.App-Management.create');
      }
}
