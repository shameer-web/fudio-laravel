@extends('layouts.vendor')


@section('content')


<?php
 $data =$page_data['data'] 
 ?>

 <?php
 $data1 =$page_data['data1'] 
 ?>


 <?php
 $data2 =$page_data['data2'] 
 ?>



<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-2 mr-5">Order</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Actions-->
									
									<!--end::Actions-->
									<!--begin::Dropdown-->
									
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
								<!--begin::Notice-->
								<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
									<div class="alert-icon">
										<span class="svg-icon svg-icon-primary svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
													<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									{{-- <div class="alert-text">The default page control presented by DataTables (forward and backward buttons with up to 7 page numbers in-between) is fine for most situations.
									<br />For more info see
									<a class="font-weight-bold" href="https://datatables.net/" target="_blank">the official home</a>of the plugin.</div> --}}
								</div>
								<!--end::Notice-->
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											{{-- <h3 class="card-label">Paginations
											<span class="d-block text-muted pt-2 font-size-sm">extended pagination options</span></h3> --}}
										</div>
										<div class="card-toolbar">
											
											<!--begin::Button-->
											<a href="{{ route('orders.index') }}" class="btn btn-primary font-weight-bolder">
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
											</span>Back</a>
											<!--end::Button-->
										</div>
									</div>




									
                                    <div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable text-center" id="kt_datatable">
											<thead>
												<tr>
													<th >Name</th>
													<th >Phone Number</th>
													
														
												</tr>
											</thead>


											@foreach($data1 as $row)
											<tbody>
								
												<tr>
													<td class="text-success"><h2><b>{{ $row->name }}</b></h2></td>
													<td class="text-success">

														<h1><b>{{ $row->mobile }}</b></h2>
													</td>
                                                    
                                                     
                                                
												</tr>
											</tbody>
											@endforeach

											
										</table>
										<!--end: Datatable-->
									</div>

                                     

                                    <div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable text-center" id="kt_datatable">
											<thead>
												<tr>
													<th><h2>Item name</h2></th>
													<th><h2>Item Image</h2></th>
													
														
												</tr>
											</thead>


											@foreach($data2 as $row)
											<tbody>
								
												<tr>
													<td>{{ $row->item_name }}</td>
													<td >

														 <img src="{{ url('assets/image/item/'.$row->item_image)}}" alt="" width="100px" height="100px">
													</td>
                                                    
                                                     
                                                
												</tr>
											</tbody>
											@endforeach

											
										</table>
										<!--end: Datatable-->
									</div>

									</div>










									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable text-center" id="kt_datatable">
											<thead>
												<tr>
													<th><h2>Item Price</h2></th>
													<th><h2>Item Quantity</h2></th>
													<th><h2>Item Total</h2></th>
													
														
												</tr>
											</thead>


											@foreach($data as $row)
											<tbody>
								
												<tr>
													<td>{{ $row->item_price }}</td>
													<td>{{ $row->item_quantity }}</td>
                                                    <td>{{ $row->item_total }}</td>
                                                     
                                                
												</tr>
											</tbody>
											@endforeach

											
										</table>
										<!--end: Datatable-->
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



