<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

      public function index()
    {

    	 $page_data['title']="Users";
          $page_data['role']=3;
        return view('admin.index',compact('page_data'));
    }
}
