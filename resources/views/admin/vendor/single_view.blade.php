@extends('layouts.main')


@section('content')

<?php
 $vendor =$page_data['vendor'] 
 ?>

 <?php
 $categories =$page_data['categories'] 
 ?>

{{-- {{ dd($skill) }}
 --}}

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								
								<!--end::Info-->
								<!--begin::Toolbar-->
																<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Notice-->
								
								<!--end::Notice-->
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label">Vendor Table
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											
											<!--end::Dropdown-->
											<!--begin::Button-->
											<a href="{{ route('vendor.index') }}" class="btn btn-success font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>BACK</a>
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
                                      
                                       <div class="row pl-9">
                                       	
                                       
                                         <div class="card-body col-md-4 pl-9">
                                         
                                           <label><h3 class="text-success"> Vendor Image</h3></label><br>
                                           <img src="{{ url('assets/image/vendor/vendor/'.$vendor->vendor_image)}}" alt="" width="100px" height="100px" class="pl-8">


                                        </div>

 
                                            <div class="card-body col-md-4 pl- ml-auto">
                                         
                                           <label><h3 class="text-success"> Banner Image</h3></label><br>
                                           <img src="{{ url('assets/image/vendor/banner/'.$vendor->banner_image)}}" alt="" width="100px" height="100px" class="pl-8">


                                        </div>

                                        </div>
                                    

                                        <div class="d-flex justify-content-center">
                                        	
                                       
										<form action="#" method="post" enctype="multipart/form-data" class="col-md-6">
												
												<div class="card-body ">
													
													<div class="form-group">
														<label><h3> Name</h3></label>
														<input type="text" name="vendor_location" class="form-control"value="{{ $vendor->vendor_name}}" placeholder="Enter  Vendor Location" />
														
													</div>



													<div class="form-group">
														<label><h3> Email</h3></label>
														<input type="text" name="email" class="form-control"value="{{ $vendor->email}}" placeholder="Enter  Vendor Location" />
														
													</div>

													

													<div class="form-group">
														<label> <h3>Skills</h3></label>
														@foreach($categories as$category )
														<input type="text" name="vendor_area"  value="{{ $category->category_name }}"class="form-control" placeholder="Enter  Vendor Area" />
														@endforeach
														
													</div>


													<div class="form-group">
														<label><h3>description</h3></label>
														<input type="text" name="vendor_name" value="{{ $vendor->description }}"class="form-control" placeholder="Enter  Vendor Name" />
														
													</div>




													<div class="form-group">
														<label> <h3>Address</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->address }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>



													<div class="form-group">
														<label><h3> PinCode</h3></label>
														<input type="text" name="pincode" 
														value="{{ $vendor->pincode }}"class="form-control" placeholder="Enter  Phone Number" />
														
													</div>



													<div class="form-group">
														<label> <h3>Mobile</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->mobile }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>

													<div class="form-group">
														<label> <h3>Land phone</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->land_phone }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>
													<div class="form-group">
														<label> <h3>Area</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->area }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>

													<div class="form-group">
														<label> <h3>Country</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->country }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>


													<div class="form-group">
														<label> <h3>Delivery Charge</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->delivery_charge }}"
														class="form-control" placeholder="Enter  Vendor Address" />
														
													</div>


													<div class="form-group">
														<label> <h3>Packing Charge</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->packing_charge }}"
														class="form-control" placeholder="" />
														
													</div>


													<div class="form-group">
														<label> <h3>Distance</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->distance }}"
														class="form-control" placeholder="" />
														
													</div>


													<div class="form-group">
														<label> <h3>Minimum Delivery Time</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->minimum_delivery_time }}"
														class="form-control" placeholder="" />
														
													</div>


													<div class="form-group">
														<label> <h3>License Certification Number</h3></label>
														<input type="text" name="license_certification_number" 
                                                        value="{{ $vendor->address }}"
														class="form-control" placeholder="" />
														
													</div>


													<div class="form-group">
														<label> <h3>Google Address</h3></label>
														<input type="text" name="vendor_address" 
                                                        value="{{ $vendor->google_address }}"
														class="form-control" placeholder="" />
														
													</div>

                                             </div>
                                         </form>
                                     </div>


												
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
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



