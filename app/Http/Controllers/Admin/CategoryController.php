<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          // $data= Category::all();
            $data=Category::where('category_status', 1)->get();
            $page_data['data']=$data;
     
          $page_data['title']="Category";
          $page_data['role']=3;

        return view('admin.category.index',compact('data','page_data'))
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

          $page_data['title']="Create Category";
          $page_data['role']=3;

        return view('admin.category.create',compact('page_data'));


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
           'category_name' =>'required|max:100',
          'image' =>'required',

        ]);

        //dd($request->all());
       //  $category =new Category();
       //  $category->category_name =$request->category_name;


       // $filename =$request->category_image->getClientOriginalName();
       // $request->category_image->storeAs('images',$filename,'public');
       // $category->category_image =$filename;

       // $category ->save();

       // return redirect()->route('category.index')->with('message','succesfully added your field');





       $name = time() . '.' . $request->file('image')->extension();

        $path = $request->file('image')->storeAs('category', $name);
        if ($path) {
            $request['category_image'] = $name;
            $create =  Category::create($request->toArray());
            if ($create) {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Created');
                Session::flash('toastcontent', 'New Category Created  Successfully');
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

        return redirect()->route('category.index')->with('message','succesfully update your field');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
      //  $item =Category::find($id);
        $item =$category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
         $page_data['title']="Category";
          $page_data['role']=3;

        $edit= $category;
        $page_data['edit']=$edit;

        return view('admin.category.edit',compact('page_data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         // dd($category);
        // $category =Category::find($id);

        //   $category ->category_name =$request->category_name;
       

   
         
        // if($request->hasFile('category_image')){
        //     $filename = $request->category_image->getClientOriginalName();
        //     if(Category::find($id)->category_image){
        //         Storage::delete('/public/images/'.Category::find($id)->category_image);
        //     }
        //    $request->category_image->storeAs('images',$filename,'public');
        //    $category->category_image =$filename;
        //  }
        //  $category->save();
        //  return redirect()->route('category.index')->with('message','succesfully update your field');


           if ($request->hasFile('image')) {

            $name = time() . '.' . $request->file('image')->extension();

            $path = $request->file('image')->storeAs('category', $name);
            if ($path) {

                $request['category_image'] = $name;
            }
        } elseif (isset($request->banner_old_image)) {

            $request['category_image'] = $request['category_old_image'];
        }

        $cardholder_update = $category->update($request->toArray());
        if ($cardholder_update) {

            if (isset($request->category_status) and $request->category_status == '0') {
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

          //dd($category);
      // dd($cardholder_update);
       return redirect()->route('category.index')->with('message','succesfully update your field');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //

    }
   
}
