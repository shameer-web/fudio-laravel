<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Item;
use App\Menu;
use App\Vendor;
use Auth;
use DB; 


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct() {


         $user_id =Auth::id();
         //dd($user_id);
         // $vendor=Vendor::where('user_id','=', Auth::id())
         //                 ->first();




        $vendor = DB::table('users')
       ->join('vendors', 'users.id', '=', 'vendors.user_id')
       ->select('vendors.id')
       ->first(); 
       
                       // dd($vendor->id) ;
                         //dd($vendor);

                        $vendor_id=$vendor->id;
                         //$this->vendor = $vendor;

        $this->vendor_id = $vendor->id;
     }




    public function index()
    {  
     // dd($this->vendor);
        // dd(Auth::id());
     // dd( $this->vendor_id );

       $data = DB::table('categories')
       ->join('items', 'categories.id', '=', 'items.category_id')
       ->select('items.item_name','items.item_image','items.description','items.item_price','items.offer_price','items.diet','categories.category_name','items.id')
       ->where('items.item_status', 1)
       ->where('items.vendor_id', '=', $this->vendor_id)
       ->get();

         // $data= Item::all();
          $page_data['data']=$data;
          $page_data['title']="Items";
          $page_data['role']=2;

        return view('vendor.item.index',compact('page_data'))
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
         $vendor_id=$this->vendor_id;
        $page_data['title']="Create Items";
          $page_data['role']=2;

       $data =Category::where('category_status', 1)->get();
        $menu =Menu::where('menu_status', 1)->get();
        $page_data['data']=$data;
        $page_data['menu']=$menu;
      $page_data['vendor_id']=$vendor_id;
        
        return view('vendor.item.create',compact('page_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       //dd($request->all()) ;


        $request->validate([



           'item_name' =>'required|max:300',
           'image'=>'required',
           'description'=>'required|max:300',
           'item_price' =>'required|integer',
           'offer_price' =>'required|integer',
           'diet'  =>'required|max:300',
           'category_id' =>'required|max:300',
           'menu_id' =>'required|max:300',
           'preparation_time'=>'required|max:300',





        ]);








        $name = time() . '.' . $request->file('image')->extension();

        $path = $request->file('image')->storeAs('item', $name);
        if ($path) {
            $request['item_image'] = $name;
            $create = Item::create($request->toArray());
            if ($create) {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Created');
                Session::flash('toastcontent', 'New Item Created  Successfully');
            } else {
                Session::flash('toasttype', 'danger');
                Session::flash('toasttitle', 'Cant Create');
                Session::flash('toastcontent', 'Technical Issue Image Transfered');
            }
        } else {
            Session::flash('toasttype', 'danger');
            Session::flash('toasttitle', 'Cant Create');
            Session::flash('toastcontent', 'Technical Issue Image Not Transfered');
        }


         return redirect()->route('items.index')->with('message','succesfully created your field');



      
      

       
       
        




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //



        // dd($item);
        $items =$item;
        $category =Category::all();
        //dd($category);
        $vendor=Vendor::all();
       // dd($vendor);
        $menu=Menu::all();
        //dd($menu);


          $page_data['title']="Items";
          $page_data['role']=2;
          $page_data['items'] =$items;
          $page_data['category'] =$category;
          $page_data['menu'] =$menu;

          return view('vendor.item.single_view',compact('page_data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        //dd($id);

        




          $edit =$item;
          $page_data['edit']=$edit;

           $data =Category::where('category_status', 1)->get();
           $page_data['data']=$data;
          $page_data['title']="items";
          $page_data['role']=2;

       // $show= Vendor::find($id);
          

         

        return view('vendor.item.edit',compact('page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //

       //  //dd($request->all());
       



        if ($request->hasFile('image')) {

            $name = time() . '.' . $request->file('image')->extension();

            $path = $request->file('image')->storeAs('item', $name);
            if ($path) {

                $request['item_image'] = $name;
            }
        } elseif (isset($request->banner_old_image)) {

            $request['item_image'] = $request['item_old_image'];
        }

        $cardholder_update = $item->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->item_status) and $request->item_status == '0') {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Deleted');
                Session::flash('toastcontent', 'banner Deleted  Successfully');
            } else {

                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Success');
                Session::flash('toastcontent', 'banner updated Successfully');
            }
        } else {
            Session::flash('toasttype', 'error');
            Session::flash('toasttitle', 'Error');
            Session::flash('toastcontent', 'course Not Updated');
        }

       


        return redirect()->route('items.index')->with('message','succesfully Update your field');











    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //



   
    
    }
}
