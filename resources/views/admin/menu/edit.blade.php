@extends('layouts.main')


@section('content')


<?php
 $edit =$page_data['edit'] 
 ?>

 <?php
 $data1 =$page_data['data1'] 
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
										<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Edit Menu Form</h2>
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
											<form action="{{ route('menus.update',$edit->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('put')
												<div class="card-body">
													
													<div class="form-group">
														
														<label>Menu Name</label>
														<input type="text" name="menu" class="form-control" value="{{ $edit->menu }}" placeholder="Enter  Item Name" />
														
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