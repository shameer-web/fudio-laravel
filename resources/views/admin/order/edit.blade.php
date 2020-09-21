@extends('layouts.main')


@section('content')

 <?php
 $data =$page_data['data'] 
 ?>

 <?php
 $edit =$page_data['edit'] 
 ?>


<div >
		 @if ($message = Session::get('message'))
        <div class="alert alert-info">
            <p class="text-center" style="font-size: 24px">{{ $message }}</p>
        </div>
       @endif
</div>





<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-2 mr-5">Edit Order</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Actions-->
									<a href="#" class="btn btn-light font-weight-bold btn-sm">Actions</a>
									<!--end::Actions-->
									<!--begin::Dropdown-->
									<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
										<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
										
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
												<h3 class="card-title"></h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
											<!--begin::Form-->
											<form class="form" action="#" method="post" enctype="multipart/form-data">
												@csrf
												@method('put')
												<div class="card-body">


													<div class="form-group row">


													<div class="col-lg-6">
														<label for="exampleSelect1">Select Vendor</label>
														
														<select name="vendor_id" value="{{ $edit->vendor_id }}" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															 @foreach($data as $row)
															<option value="{{ $row->id }}"
                                                                     @if($row->id == $edit->vendor_id )
                                                                     selected
                                                                     @endif

																>
																{{ $row->vendor_name }}</option>
															 @endforeach
															
														</select>
														


														 @error('vendor_id')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>
														
														<div class="col-lg-6">
															<label>Delivery Date</label>
															<input type="date" class="form-control" name="delivery_date" placeholder="Enter delivery_date" />


													    @error('delivery_date')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>


														
													</div>
													





													<div class="form-group row">


														<div class="col-lg-6">
															<label>Total Amount:</label>
															<input type="text" name="total_amount" class="form-control" placeholder="Enter total_amount" />


														@error('total_amount')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>
														
														
 
                                                      <div class="col-lg-6">
															<label>Discounts</label>
															<input type="text" name="discounts" class="form-control" placeholder="Enter discounts" />


														@error('discounts')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>

                                                  														
													</div>



													<div class="form-group row">



														<div class="col-lg-6">
															<label>Delivery_Charge:</label>
															<input type="text" name="delivery_charge" class="form-control" placeholder="Enter delivery_charge" />

														@error('delivery_charge')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>


														<div class="col-lg-6">
															<label>Packaging Charge</label>
															<div class="input-group">
																<input type="text" name="packaging_charge" class="form-control" placeholder="Enter packaging charge" />
																
															</div>
														@error('packaging_charge')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>
														
														
														



													</div>



													<div class="form-group row">


														<div class="col-lg-6">
															<label>Billing Address</label>
															<div class="input-group">
																<input type="text" name="billing_address" class="form-control" placeholder="Enter billing_address" />
																
															</div>
														@error('billing_address')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>
														
														<div class="col-lg-6">
															<label>Delivery Address:</label>
															<div class="input-group">
																<input type="text" class="form-control" name="delivery_address"placeholder="Enter delivery_address" />
																
														    </div>

														@error('delivery_address')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>




													</div>



													<div class="form-group row">
														<div class="col-lg-6">
															<label>Order Platform</label>
															<input type="text" name="order_platform" class="form-control" placeholder="Enter order_platform" />

														@error('order_platform')
														<p class="text-danger">{{ $message }}</p>
														@enderror
															
														</div>
														
														<div class="col-lg-6">
														<label for="exampleSelect1">Order Status</label>
														
														<select name="order_status" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>


															 
															
															
														</select>


														 @error('order_status')
														<p class="text-danger">{{ $message }}</p>
														@enderror
														
													</div>

														
													</div>





													








													{{-- <div class="form-group row">
														<div class="col-lg-6">
															<label>User Group:</label>
															<div class="radio-inline">
																<label class="radio radio-solid">
																<input type="radio" name="example_2" checked="checked" value="2" />Sales Person
																<span></span></label>
																<label class="radio radio-solid">
																<input type="radio" name="example_2" value="2" />Customer
																<span></span></label>
															</div>
															<span class="form-text text-muted">Please select user group</span>
														</div>
													</div> --}}
													<!-- begin: Example Code-->
													
													<!-- end: Example Code-->
												</div>
												<div class="card-footer">
													<div class="row">
														<div class="col-lg-6">
															<button type="submit" class="btn btn-primary mr-2">Save</button>
															<button type="reset" class="btn btn-secondary">Cancel</button>
														</div>
														
													</div>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
										<!--begin::Card-->
										<!--end::Card-->
										<!--begin::Card-->
										<!--end::Card-->
										<!--begin::Card-->
										
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