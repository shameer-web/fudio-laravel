@extends('layouts.vendor')


@section('content')


<?php
$data=$page_data['data'];

?>



<div >
		  @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p class="text-center" style="font-size: 24px">{{ $message }}</p>
        </div>
        @endif
</div>



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
											<h3 class="card-label">Order Table
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											
											<!--end::Dropdown-->
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
											</span>New Record</a>
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Delivery Date && Time</th>
													<th>Total Amount</th>
													<th>Billing Address</th>
													<th>Delivery Address</th>
													<th>Order Platform</th>
													<th>Order status</th>
										
													<th>Actions</th>
													
												</tr>
											</thead>


											@foreach($data as $row)
											<tbody>
								
												<tr>
													<td>{{ ++$i }}</td>
													<td>{{ $row->delivery_date }},
														{{ $row->delivery_time }}


													</td>
													<td>{{ $row->total_amount  }}</td>
													<td>{{ $row->billing_address  }}</td>
													<td>{{ $row->delivery_address  }}</td>
													<td>{{ $row->order_platform  }}</td>
												{{-- 	<td>{{ $row->order_status  }}</td> --}}
						
                                                     <td>
                                                     	
                                                    
                                                     	<button type="button" id="statusbtn"
                                                              data-action="{{route('orders.update',$row->id)}}" data-toggle="modal"
                                                              data-target="#status_modal" class="btn btn-outline-success">
                                                               
                                                                 {{-- {{ $row->order_status }} --}}
                                                              <?php

                                                             $order = $row->order_status;

                                                             switch ($order)
                                                              {
                                                              case "0":
                                                                    echo "Reject";
                                                                    break;
                                                              case "1":
                                                                    echo "Order Placed";
                                                                    break;
                                                              case "2":
                                                                    echo "Order Confirmed";
                                                                    break;
                                                              case "3":
                                                                    echo "Order Dispatched";
                                                                    break;
                                                              case "4":
                                                                    echo "Delivered";
                                                                    break;
                                                              case "5":
                                                                    echo "Payment Failed";
                                                                    break;      
                                                              default:
                                                                    echo "Order Failed";
                                                             }
                                                             
                                                             ?>


                                                             </button>

                                                     </td>
                                                    
													
                                                  
                                                     <td>
                                                    	

                                                    	  

                                                    	  	 <a href="{{ route('orders.show',$row->id) }}"
                                      
                                                            class="btn btn-outline-info"><i
                                                            class="fa fa-eye" aria-hidden="true"></i>
                                                         </a> 


                                                    	{{-- <a href="{{ route('orders.edit',$row->id) }}"
                                      
                                                            class="btn btn-outline-warning"><i
                                                            class="fa fa-edit" aria-hidden="true"></i>
                                                         </a> --}}


                                                    	

                                                             <button type="button" id="deletebtn"
                                                              data-action="{{route('orders.update',$row->id)}}" data-toggle="modal"
                                                              data-target="#delete_modal" class="btn btn-outline-danger"><i class="fas fa-times"></i>
                                                             </button>




                                                    	

                                                    	
                                                    </td>

												</tr>
											</tbody>
											@endforeach

											
										</table>
										<!--end: Datatable-->
									</div>

        <!--start: DeleteModal-->

           <div class="modal fade" tabindex="-1" id="delete_modal" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <form id="delete_form" action="" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="alert alert-danger" role="alert" style="margin-bottom: 0px">
                                <button type="button" class="close" data-dismiss="modal"></button>
                                <br />
                                <h4 class="alert-heading">Warning! Please Confirm to cancel this order</h4>
                                <br />

                                                       




                                 <p>Are You Sure to Cancel this Order ? ,
                                   What may be the reason for cancel this order? </p>

										<textarea name="cancel_note" class="form-control" placeholder=""></textarea>
									
									  <br />

                                <p>


                                    <button class="btn btn-danger " type="submit" name="submit">Confirm &
                                        Cancel</button>

                                    <button type="button" class="btn btn-primary modal-dismiss"
                                        data-dismiss="modal">Close</button>
                                </p>
                                <input type="hidden" name="order_status" value="0">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

             <!--end: DeleteModal-->


              <!--start: Order Status Modal-->




            

           <div class="modal fade" tabindex="-1" id="status_modal" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <form id="order_form" action="" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="alert alert-primary" role="alert" style="margin-bottom: 0px">
                                <button type="button" class="close" data-dismiss="modal"></button>
                                <br />
                                <h4 class="alert-heading">Please select the current order status</h4>
                                <br />

                                                       




                                {{--  <p>Are You Sure to Cancel this Order ? ,
                                   What may be the reason for cancel this order? </p> --}}

										<select name="order_status" class="form-control" id="exampleSelect1" placeholder="Enter Student Gender">
															 
														<option value="1" >Order Placed</option>
														<option value="2" >Order Confirmed</option>
														<option value="3" >Order Dispatched</option>
														<option value="4" >Delivered</option>
														<option value="5" >Payment Failed</option>



															
										</select>
									
									  <br />

                                <p>


                                    <button class="btn btn-success " type="submit" name="submit">Confirm &
                                        Cancel</button>

                                    <button type="button" class="btn btn-danger modal-dismiss"
                                        data-dismiss="modal">Close</button>
                                </p>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            




              <!--end: Order Status Modal-->










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



    <script src="{{ asset('vendor/js/pages/crud/datatables/extensions/buttons.js')}}"></script>
<script>
$('body').on('click', '#deletebtn', function() {
    var no = $(this).closest('tr').children('td');

    $('#deletebtn').data('action');
    var action = $(this).data('action');
    $('#delete_form').attr('action', action);

})


statusbtn


$('body').on('click', '#statusbtn', function() {
    var no = $(this).closest('tr').children('td');

    $('#statusbtn').data('action');
    var action = $(this).data('action');
    $('#order_form').attr('action', action);

})
</script>

     <!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/crud/datatables/basic/paginations.js')}}"></script>
		<!--end::Page Scripts-->

@endsection



