@extends('layouts.vendor')


@section('content')


<?php

$data=$page_data['data'];

?>


<?php

$menu=$page_data['menu'];

?>


 <?php
 $vendor_id =$page_data['vendor_id'] 
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
										<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Create Item</h2>
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
											<form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="card-body">
													
													<div class="form-group">
														
														<label>Item Name</label>
														<input type="text" name="item_name" class="form-control" placeholder="Enter  Item Name" />


														@error('item_name')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
														
													</div>

													<div class="form-group">
														<label>Item Image</label>
														<input type="file" name="image" class="form-control" placeholder="item Image" />



														@error('image')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
														
													</div>

													<div class="form-group">
														
														<label>Description</label>
														<input type="text" name="description" class="form-control" placeholder="Enter  Item Name" />


														@error('description')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
														
													</div>


													<div class="form-group">
														
														<label>Price</label>
														<input type="text" name="item_price" class="form-control" placeholder="Enter  Item Name" />

														@error('item_price')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
														
													</div>



													<div class="form-group">
														
														<label>Offer Price</label>
														<input type="text" name="offer_price" class="form-control" placeholder="Enter  Item Name" />


														@error('offer_price')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
														
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


                                                       @error('diet')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
													   
                                                  </div>

													

                                                       
													<div class="form-group">
														<label for="exampleSelect1">Category name</label>
														
														<select name="category_id" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															 @foreach($data as $row)
															<option value="{{ $row->id }}" >{{ $row->category_name }}</option>
															 @endforeach
															
														</select>



														 @error('category_id')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
														
													</div>


													<div class="form-group">
														<label for="exampleSelect1">Menu name</label>
														
														<select name="menu_id" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															 @foreach($menu as $row)
															<option value="{{ $row->id }}" >{{ $row->menu }}</option>
															 @endforeach
															
														</select>

														 @error('menu_id')
									                      <p class="text-danger">{{ $message }}</p>
								                        @enderror
														
													</div>


													<div class="form-group">
														
														<label>Preparation Time</label>
														<input type="number" name="preparation_time" class="form-control" placeholder="Minutes" />
														

                                                       @error('preparation_time')
														<p class="text-danger">{{ $message }}</p>
														@enderror

													</div>



                                                  <input type="hidden" id="vendor_id" name="vendor_id" value="{{ $vendor_id }}">
													


													
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