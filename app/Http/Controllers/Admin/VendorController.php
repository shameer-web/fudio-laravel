<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Vendor;
use App\Category;
use App\User;
use DB;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        
           
          $data= Vendor::where('vendor_status', 1)->get();
          $page_data['data'] = $data;
     
          $page_data['title']="Vendors";
          $page_data['role']=3;

        return view('admin.vendor.index',compact('page_data'))
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

        $data =Category::where('category_status', 1)->get();
         $page_data['data']=$data;
        $page_data['title']="Create Vendor";
        $page_data['role']=3;

        return view('admin.vendor.create',compact('page_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->skills);
       // dd($request->all());
        // dd($request->image->getClientOriginalName());

           $request->validate([

        'email'=>'required|max:300|email',
        'password'=>'required|max:15|min:5',
        'vendor_name'=>'required|max:300',
        'skills'=>'required|max:300',
        'description' =>'required|max:300',
        'address' =>'required|max:300',
        'pincode'=>'required|integer',
        'mobile'=>'required|integer',
        'land_phone'=>'required',
        'area'=>'required|max:300',
        'country'=>'required|max:300',
        'delivery_charge'=>'required|integer',
        'packing_charge'=>'required|integer',
        'distance'=>'required|max:300',

         'minimum_delivery_time'=>'required|integer',
         'license_certification_number'=>'required|integer',
         'image'=>'required',
         'google_address'=>'required|max:300',
         'latitude'=>'required|max:300',
         'longitude'=>'required|max:300',
         'image'=>'required',
         
         

        ]);
          // dd($request->all());

           $user =new User();


           $exist_user = User::where('email', '=', $request->email)
                         ->where('user_status','=',1)
                         ->first();

           if($exist_user){
               // return "already added";

             return redirect()->route('vendor.create')->with('message','email already exist in table.');
           }
           else{
              $request['email'] = $request->email; 

               // $password = $request->password; 
               // $user->password = Hash::make($password);

                $request['password']= Hash::make($request->password);  

              $create =  User::create($request->toArray());
            if ($create) {
                // Session::flash('toasttype', 'success');
                // Session::flash('toasttitle', 'Created');
                // Session::flash('toastcontent', 'New Course Created  Successfully');
               

            $request['user_id'] = $create->id ;
           $request['skills'] = json_encode($request->skills);

           $name = time() . '.' . $request->file('image')->extension();
             $name1 = time() . '.' . $request->file('image1')->extension();

        $path = $request->file('image')->storeAs('vendor/vendor', $name);
         $path = $request->file('image1')->storeAs('vendor/banner', $name1);
        if ($path) {
            $request['vendor_image'] = $name;
             $request['banner_image'] = $name1;
            $create =  Vendor::create($request->toArray());
            if ($create) {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Created');
                Session::flash('toastcontent', 'New Vendor Created  Successfully');
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









            } 

         
           }
          



          return redirect()->route('vendor.index')->with('message','succesfully created your field');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //

         //dd($vendor->skills);




             //  $data1 = DB::table('categories')
             // ->join('vendors', 'categories.id', '=', 'vendors.skills')
             // ->select('categories.category_name','categories.id')
             // ->get();


        


       $skills = $vendor->skills;
       $skill = json_decode($skills);
       $categories = Category::whereIn('id',$skill)->get();



      // dd($categories);
          $page_data['categories']=$categories;
          $page_data['title']="Users";
          $page_data['role']=3;
          $page_data['vendor'] =$vendor;

       // $show= Vendor::find($id);
          

         

        return view('admin.vendor.single_view',compact('page_data'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
           $skills = $vendor->skills;
         $skill = json_decode($skills);
         // dd($skill);
         $page_data['skill'] =  $skill;
        $page_data['vendor'] = $vendor;
        $page_data['title'] = 'Vendor';
        $data=Category::all();
        $page_data['data'] = $data;

        return view('admin.vendor.edit', compact('page_data'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        


            if ($request->hasFile('image')) {

            $name = time() . '.' . $request->file('image')->extension();

            $path = $request->file('image')->storeAs('vendor/vendor', $name);
            if ($path) {

                $request['vendor_image'] = $name;
            }
        } elseif (isset($request->vendor_old_image)) {

            $request['vendor_image'] = $request['vendor_old_image'];
        }





            if ($request->hasFile('image1')) {

            $name = time() . '.' . $request->file('image1')->extension();

            $path = $request->file('image1')->storeAs('vendor/banner', $name);
            if ($path) {

                $request['banner_image'] = $name;
            }
        } elseif (isset($request->vendor_old_image)) {

            $request['banner_image'] = $request['banner_old_image'];
        }








        $cardholder_update = $vendor->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->vendor_status) and $request->vendor_status == '0') {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Deleted');
                Session::flash('toastcontent', 'Vendor Deleted  Successfully');
            } else {

                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Success');
                Session::flash('toastcontent', 'Vendor updated Successfully');
            }
        } else {
            Session::flash('toasttype', 'error');
            Session::flash('toasttitle', 'Error');
            Session::flash('toastcontent', 'course Not Updated');
        }

       
        
                return redirect()->route('vendor.index');
        




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //


      //  $vendor =Vendor::find($id);


        
    }
}
