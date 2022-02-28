@extends('layouts.master')
@section('title')
Product List
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Products</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('Error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
				<!-- row -->
				<div class="row">
                    					<!--div-->

					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between col-sm-3">
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
									data-toggle="modal" href="#exampleModal">ِAdd Product</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap" data-page-length='10'>
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">product Name</th>
												<th class="border-bottom-0">Section Name</th>
												<th class="border-bottom-0">Notes</th>
												<th class="border-bottom-0">Processes</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=0 ?>
											@foreach ($products as $product)
											<?php $i++?>
											<tr>
												<td>{{$i}}</td>
												<td>$product->product_name</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2011/04/25</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
					<div class="modal" id="exampleModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Add Product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
                    <form action="{{ route('products.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" class="form-control" id="Product_name" name="Product_name" required>
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Section</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="" selected disabled> --Choose Section--</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Notes</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
		<!-- End Basic modal -->

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection