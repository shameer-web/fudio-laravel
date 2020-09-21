<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Menu;
use App\Vendor;
use Auth;
use DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



   
    public function index()
    {
        //
      // dd($this->vendor_id);
        $data = DB::table('vendors')
       ->join('menus', 'vendors.id', '=', 'menus.vendor_id')
       ->select('vendors.vendor_name','menus.id','menus.menu')
       ->where('menus.menu_status', '=',1)
       ->get();


        
        // $data=Menu::where('menu_status', 1)   
        // ->get();
          $page_data['data']=$data;
          $page_data['title']="Menu";
          $page_data['role']=3;

     return view('admin.menu.index', compact('page_data'))
     ->with('i', (request()->input('page', 1) - 1) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $vendor_id=Vendor::where('vendor_status', 1)->get();
         $page_data['title']="Menu Create";
          $page_data['role']=3;

        //$data =$this->vendor_id;
       // dd($data);
          $page_data['vendor_id']=$vendor_id;
        return view('admin.menu.create',compact('page_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'menu'=>'required|max:300',
        ]);
        //dd($request->all());
        $menu = new Menu();


        $menu->menu =$request->menu;
        $menu->vendor_id =$request->vendor_id;

        $menu->save();

       // return "hiiii";

        return redirect()->route('menus.index')->with('message','succesfully created your field');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
        $data1 =Vendor::where('vendor_status', 1)->get();
           
        $page_data['data1']=$data1;

          $edit =$menu;
          $page_data['edit']=$edit;

         // $data =Menu::all();
          $page_data['title']="Menu";
          $page_data['role']=3;

       // $show= Vendor::find($id);
          

         

        return view('admin.menu.edit',compact('page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //


      


        $cardholder_update = $menu->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->menu_status) and $request->menu_status === '0') {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Deleted');
                Session::flash('toastcontent', 'Menu Deleted  Successfully');
            } else {

                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Success');
                Session::flash('toastcontent', 'Menu updated Successfully');
            }
        } else {
            Session::flash('toasttype', 'error');
            Session::flash('toasttitle', 'Error');
            Session::flash('toastcontent', 'Menu Not Updated');
        }

        return redirect()->route('menus.index')->with('message','succesfully update your field');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

    }
}
