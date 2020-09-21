<?php

namespace App\Http\Controllers\Admin;

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

   





    public function index()
    {
        // 
    
     // dd(Auth::id());
       // $data = DB::table('categories')
       // ->join('items', 'categories.id', '=', 'items.category_id')
       // ->select('items.item_name','items.item_image','items.description','items.item_price','items.offer_price','items.diet','categories.category_name','items.id','items.preparation_time')
       // ->where('item_status', 1)
       // ->get();




        $data = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->join('menus', 'items.menu_id', '=', 'menus.id')
            ->join('vendors', 'items.vendor_id', '=', 'vendors.id')

            ->select('items.*', 'categories.category_name', 'menus.menu','vendors.vendor_name')
             ->where('item_status', 1)
            ->get();

         // $data= Item::all();
         $page_data['data']=$data;
     
          $page_data['title']="Items";
          $page_data['role']=3;

        return view('admin.item.index',compact('page_data'))
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
        $page_data['title']="Create Items";
          $page_data['role']=3;

        $data =Category::where('category_status', 1)->get();
        $menu =Menu::where('menu_status', 1)->get();
        $page_data['data']=$data;
        $page_data['menu']=$menu;
        $page_data['vendor_id']=$vendor_id;
        return view('admin.item.create',compact('page_data'));
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
      // dd( $this->vendor_id);

        $request->validate([



           'item_name' =>'required|max:300',
           'image'=>'required',
           'description'=>'required|max:300',
           'item_price' =>'required|integer',
           'offer_price' =>'required|integer',
           'diet'  =>'required|max:300',
           'category_id' =>'required|max:300',
           'menu_id' =>'required|max:300',
           'vendor_id'=>'required|max:300',
           'preparation_time'=>'required|max:300',





        ]);
        //dd($request->all());

       // dd(Auth::id());




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


         return redirect()->route('item.index')->with('message','succesfully created your field');






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
          $page_data['role']=3;
          $page_data['items'] =$items;
          $page_data['category'] =$category;
          $page_data['vendor'] =$vendor;
          $page_data['menu'] =$menu;

          return view('admin.item.single_view',compact('page_data')); 


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

           $data1 =Vendor::where('vendor_status', 1)->get();
           
            $page_data['data1']=$data1;
           $page_data['data']=$data;
          $page_data['title']="items";
          $page_data['role']=3;

       // $show= Vendor::find($id);
          

         

        return view('admin.item.edit',compact('page_data'));
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

        return redirect()->route('item.index');











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
