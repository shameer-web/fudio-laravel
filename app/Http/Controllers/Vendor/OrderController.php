<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Vendor;
use App\OrderItem;
use Auth;
use DB;

class OrderController extends Controller
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
        
     // dd( $this->vendor_id);

         $data=Order::where('vendor_id', $this->vendor_id)
         // ->where('order_status','!=', 1)
         ->get();
        // dd($data);


          $page_data['data']=$data;
          $page_data['title']="Offer";
          $page_data['role']=2;

        return view('vendor.order.index',compact('page_data'))
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
        dd($request->all());


        $request->validate([

            'user_id' => 'required|max:300',
           'vendor_id' => 'required|max:300',
           'delivery_date' => 'required|max:300',
           'delivery_time' => 'required|max:300',
           'total_amount' => 'required|integer',
           'discounts' => 'required|integer',
           'delivery_charge' => 'required|integer',
           'packaging charge' => 'required|integer',
           'billing_address' =>'required|max:300',
           'delivery_address' =>'required|max:300',
           'order_platform' =>'required|max:300',
           'order_status'=>'required',



        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //


          $order_id=$order->id;
          // dd($order_id);
          $order = $order;

              //$data = OrderItem::all();
               $data=OrderItem::where('order_item_status', 1)->get();


              $data1 = DB::table('users')
             ->join('orders', 'users.id', '=', 'orders.user_id')
             ->select('users.name','users.mobile')
             ->where('orders.order_status', '=' , 1)
             ->get();

            // dd($data1);

            $data2 =DB::table('items')
            ->leftJoin('order_items', 'items.id', '=', 'order_items.item_id')
             ->select('items.item_name','items.item_image')
             ->where('items.item_status', '=' , 1)
            ->get();

            //dd($data2);


             $page_data['title']="Order";
          $page_data['role']=2;
          $page_data['data'] =$data;
          $page_data['data1'] =$data1;
          $page_data['data2'] =$data2;

       // $show= Vendor::find($id);
          

         

        return view('vendor.order.single_view',compact('page_data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        

          $data =Vendor::where('vendor_status', 1)->get();
          $edit =$order;
          $page_data['edit']=$edit;
          $page_data['data']=$data;

          $page_data['title']="Order";
          $page_data['role']=2;
          

         

        return view('vendor.order.edit',compact('page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //dd($order);


        $cardholder_update = $order->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->order_status) and $request->order_status == '0') {
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

          return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
