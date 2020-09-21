<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Offer;

class OfferController extends Controller
{



    public function index()
    {
        //


       // $data=Offer::all();
         $data=Offer::where('offer_status', 1)->get();
          $page_data['data']=$data;
     
          $page_data['title']="Offer";
          $page_data['role']=3;

        return view('admin.offer.index',compact('page_data'))
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

          $page_data['title']="Create Offer";
          $page_data['role']=3;
        return view('admin.offer.create',compact('page_data'));
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



        $request->validate([
           
           'image' =>'required',

        ]);
       




        $name = time() . '.' . $request->file('image')->extension();

        $path = $request->file('image')->storeAs('offer/banners', $name);
        if ($path) {
            $request['banner'] = $name;
            $create =  Offer::create($request->toArray());
            if ($create) {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Created');
                Session::flash('toastcontent', 'New Banner Created  Successfully');
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


         return redirect()->route('offer.index')->with('message','succesfully created your field');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //

           $page_data['title']="Offer";
          $page_data['role']=3;

        $edit= $offer;
        $page_data['edit'] =$edit;

        return view('admin.offer.edit',compact('page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
        // $offer =Offer::find($id);
        //dd($offer);

          if ($request->hasFile('image')) {

            $name = time() . '.' . $request->file('image')->extension();

            $path = $request->file('image')->storeAs('offer/banners', $name);
            if ($path) {

                $request['banner'] = $name;
            }
        } elseif (isset($request->banner_old_image)) {

            $request['banner'] = $request['banner_old_image'];
        }

        $cardholder_update = $offer->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->offer_status) and $request->offer_status == '0') {
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

         return redirect()->route('offer.index');
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
