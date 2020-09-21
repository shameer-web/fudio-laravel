@extends('layouts.main')


@section('content')


<?php
 $items =$page_data['items'] 
 ?>

 <?php
 $category =$page_data['category'] 
 ?>


 <?php
 $vendor =$page_data['vendor'] 
 ?>


 <?php
 $menu =$page_data['menu'] 
 ?>




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
											<h3 class="card-label">Item Table
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											
											<!--end::Dropdown-->
											<!--begin::Button-->
											<a href="{{ route('item.index') }}" class="btn btn-success font-weight-bolder">
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
                                      
                                       <div class="row pl-9 d-flex justify-content-center">
                                       	
                                       
                                         <div class="card-body col-md-4 pl-9 ">
                                         
                                           <label><h3 class="text-success text-center"> Item Image</h3></label><br>
                                           <img src="{{ url('assets/image/item/'.$items->item_image)}}" alt="" width="100px" height="100px" class="pl-8">


                                        </div>

 
                                         

                                        </div>
                                    

                                        <div class="d-flex justify-content-center">
                                        	
                                       
										<form action="#" method="post" enctype="multipart/form-data" class="col-md-6">
												
												<div class="card-body ">
													
													<div class="form-group">
														<label><h3>Item name</h3></label>
														<input type="text" name="" class="form-control"value="{{ $items->item_name}}"  />
														
													</div>



													<div class="form-group">
														<label><h3> Description</h3></label>
														<input type="text" name="" class="form-control"value="{{ $items->description}}"  />
														
													</div>

													

													


													<div class="form-group">
														<label><h3>Item Price</h3></label>
														<input type="text" name="" value="{{ $items->item_price }}"class="form-control"  />
														
													</div>




													<div class="form-group">
														<label> <h3>Offer_Price</h3></label>
														<input type="text" name="" 
                                                        value="{{ $items->offer_price }}"
														class="form-control"  />
														
													</div>



													<div class="form-group">
														<label><h3> Diet</h3></label>
														<input type="text" name="" 
														value="{{ $items->diet }}"class="form-control"  />
														
													</div>

													<div class="form-group">
														<label> <h3>Preparation Time </h3></label>
														<input type="text" name="" 
                                                        value="{{ $items->preparation_time  }} minuts"
														class="form-control"  />
														
													</div>



													<div class="form-group">
														<label> <h3>Category Name</h3></label>
														
														<input type="text" name=""
														 @foreach($category as $row)
                                                            @if($row->id == $items->category_id )
                                                        value="{{ $row->category_name}}"
                                                            @endif
                                                            @endforeach
														class="form-control"  />
													
														
													</div>



													<div class="form-group">
														<label> <h3>Menu</h3></label>
														
														<input type="text" name=""
														 @foreach($menu as $row)
                                                            @if($row->id == $items->menu_id )
                                                        value="{{ $row->menu}}"
                                                            @endif
                                                            @endforeach
														class="form-control"  />
													
														
													</div>


													<div class="form-group">
														<label> <h3>Vendor Name</h3></label>
														
														<input type="text" name=""
														 @foreach($vendor as $row)
                                                            @if($row->id == $items->vendor_id )
                                                        value="{{ $row->vendor_name}}"
                                                            @endif
                                                            @endforeach
														class="form-control"  />
													
														
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



