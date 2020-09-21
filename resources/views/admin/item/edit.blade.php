@extends('layouts.main')


@section('content')

<?php
 $data =$page_data['data'] 
 ?>


 <?php
 $data1 =$page_data['data1'] 
 ?>

 <?php
 $edit =$page_data['edit'] 
 ?>







<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Edit Item Form</h2>
										<!--end::Page Title-->
										
									</div>
									<!--end::Page Heading-->
								</div>
								
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b example example-compact">
											
											<!--begin::Form-->
											<form action="{{ route('item.update',$edit->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('put')
												<div class="card-body">
													
													<div class="form-group">
														
														<label>Item Name</label>
														<input type="text" name="item_name"  value="{{ $edit->item_name }}"class="form-control" placeholder="Enter  Item Name" />
														
													</div>

													<div class="form-group">
														<label>Item Image</label>
														<input type="file" name="image" value="{{ $edit->item_image }}" class="form-control" placeholder="item Image" />
														
													</div>

													<div class="form-group">
														
														<label>Description</label>
														<input type="text" name="description" 
														value="{{ $edit->description }}" class="form-control" placeholder="Enter  Item Name" />
														
													</div>


													<div class="form-group">
														
														<label>Price</label>
														<input type="text" name="item_price"
														value="{{ $edit->item_price }}"
														 class="form-control" placeholder="Enter  Item Name" />
														
													</div>



													<div class="form-group">
														
														<label>Offer Price</label>
														<input type="text" name="offer_price" 
                                                         value="{{ $edit->offer_price }}"
														class="form-control" placeholder="Enter  Item Name" />
														
													</div>



													{{-- <div class="form-group">
														
														<label>veg or non</label>
														<input type="text" name="diet" class="form-control" placeholder="Enter  Item Name" />
														
													</div>
 --}}


													 <div class="form-group">
													<label class="label">Diet</label><br><br>
                                                     <input type="radio" name="diet" id="" value="veg">
                                                     <label class="label1">veg</label>
                                                    <input type="radio" name="diet" id="" value="non-veg">
                                                     <label class="label1">non-veg</label>
													   
                                                  </div>

													

                                                       
													<div class="form-group">
														<label for="exampleSelect1">Category name</label>
														
														<select name="category_id" value="{{ $edit->category_name }}" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															 @foreach($data as $row)
															<option value="{{ $row->id }}"
                                                                     @if($row->id == $edit->category_id )
                                                                     selected
                                                                     @endif

																>
																{{ $row->category_name }}</option>
															 @endforeach
															
														</select>
														
													</div>



													<div class="form-group">
														<label for="exampleSelect1">Vendor</label>
														
														<select name="vendor_id" value="{{ $edit->vendor_id }}" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															 @foreach($data1 as $row)
															<option value="{{ $row->id }}"
                                                                     @if($row->id == $edit->vendor_id )
                                                                     selected
                                                                     @endif

																>
																{{ $row->vendor_name }}</option>
															 @endforeach
															
														</select>
														
													</div>


													<div class="form-group">
														
														<label>Preparation Time</label>
														<input type="number" name="preparation_time"  value="{{ $edit->preparation_time }}"class="form-control"  />
														
													</div>








                                                 
													


													
												</div>
												<div class="card-footer">
													<button type="submit" value="submit" class="btn btn-primary mr-2">Submit</button>
													<button type="reset" class="btn btn-secondary">Cancel</button>
												</div>


												
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
										
										<!--end::Card-->
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>










@endsection


@section('css')

      <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />


@endsection



@section('script')

     <!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/crud/datatables/basic/paginations.js')}}"></script>
		<!--end::Page Scripts-->

@endsection