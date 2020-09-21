<?php

namespace App\Http\Controllers\Vendor;

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



     public function __construct() {


         $user_id =Auth::id();
         //dd($user_id);
         // $vendor=Vendor::where('user_id','=',$user_id)
         //                 ->first(); 



         $vendor = DB::table('users')
       ->join('vendors', 'users.id', '=', 'vendors.user_id')
       ->select('vendors.id')
       ->first();
                       // dd($vendor->id) ;
                         //dd($vendor);

                        $vendor_id=$vendor->id;

        $this->vendor_id = $vendor->id;
     }
    public function index()
    {
        //
      // dd( $this->vendor_id);



       $data=Menu::where('vendor_id','=' , $this->vendor_id)
        ->where('menus.menu_status', '=' , 1)
        ->get();


      

          $page_data['data'] =$data;
          $page_data['title']="Menu";
          $page_data['role']=2;

     return view('vendor.menu.index', compact('page_data'))
      ->with('i', (request()->input('page', 1) - 1) );
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

          $page_data['title']="Create_menu";
          $page_data['role']=2;

        $vendor_id=$this->vendor_id;
         $page_data['vendor_id']=$vendor_id;
          //$data =Auth::id();
        //$page_data['data']=$data;
        return view('vendor.menu.create',compact('page_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        

         $request->validate([

            'menu'=>'required|max:300',
        ]);

        //dd($request->all());
        // dd(Auth::id());

        $menu = new Menu();

        $menu->menu =$request->menu;
        $menu->vendor_id =$request->vendor_id;

        $menu->save();

       // return "hiiii";

        return redirect()->route('menu.index')->with('message','succesfully created your field');

      
       


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


         $edit =$menu;
         $page_data['edit'] =$edit;

         // $data =Menu::all();
          $page_data['title']="menu";
          $page_data['role']=2;

       // $show= Vendor::find($id);
          

         

        return view('vendor.menu.edit',compact('page_data'));
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

       // dd($request->all());
       



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

        return redirect()->route('menu.index')->with('message','succesfully update your field');
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
