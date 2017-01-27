@extends('layouts.admin')
@section('title','DashBoard')
@section('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

@endsection
@section('content')
<input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!-- ***************************************date range*********************************** -->
<!-- <div class="row" style="margin-bottom:20px"> 
	<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
		<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
		<span></span> <b class="caret"></b>
	</div>
</div> -->
<!-- *************************************************************************************** -->
<!-- *************************************************************************************** -->	
<div class="row">
	<h1 class="main-header text-center">History</h1>
</div>
<div class="row">
	<div class="col-lg-12">
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th style="width: 10%">Post Date</th>
					<th style="width: 10%">category</th>
					<th style="width: 15%">Product name</th>
					<th style="width: 20%">Description</th>
					<th style="width: 10%">Type</th> 
					<th style="width: 10%">Status</th>
					<th style="width: 15%">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<!-- FastClick -->
<!-- <script src="{{ asset ("/bower_components/admin-lte/plugins/fastclick/fastclick.js") }}"></script> -->
<!-- following script is just to initiate the daterange -->
<script type="text/javascript">
	// $(function() {
	// 	var start = moment().subtract(29, 'days');
	// 	var end = moment();
	// 	function cb(start, end) {
	// 		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	// 		addNewManufacturer();
	// 	}
	// 	$('#reportrange').daterangepicker({
	// 		startDate: start,
	// 		endDate: end,
	// 		ranges: {
	// 			'Today': [moment(), moment()],
	// 			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	// 			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	// 			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	// 			'This Month': [moment().startOf('month'), moment().endOf('month')],
	// 			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	// 		}
	// 	}, cb);
	// 	cb(start, end);    
	// });
</script>
<!-- this is to get the value of daterange send it to api and recieve data -->
<script type="text/javascript">
	function addNewManufacturer() {
		// var from = $("#reportrange span").text().split('-')[0];
		// var to = $("#reportrange span").text().split('-')[1];
		// var sendInfo = {
		// 	from: from,
		// 	to: to,
		// };

		// var jqxhr = $.get( "{{URL::to('/')}}/get_history",
		// 	{ user_id:user_id },
		// 	function(data) { 
		// 		var t = $('#example').DataTable();
		// 		t.clear();
		// 		for (i = 0; i < data.length; i++) {
		// 			t.row.add( [
		// 				data[i].name,
		// 				data[i].phone,
		// 				data[i].arrival_time,
		// 				data[i].exit_time,
		// 				data[i].resident_name,
		// 				data[i].photo,
		// 				] ).draw( false );
		// 		}
		// 	});


	}


	$(document).ready(function() {
		var user_id=$('#user_id').val();


		$.ajax({
			url: "{{URL::to('/')}}/history",
			method: "post",
			data:{user_id:user_id},
			datatype: 'json',
			success: function(data){
				console.log(data);
				$("#example").dataTable({
					data:data, 
    			// columns: [
    			// { "data": "post_date" },
    			// { "data": "category" },
    			// { "data": "name" },
    			// { "data": "description" },
    			// { 
    			// 	"data": "type"
    			// 	"render":function(type){
    			// 		if (type==1) {
    			// 			return "Advertisement";
    			// 		}else{
    			// 			return "Request For Goods";
    			// 		}
    			// 	}
    			// },
    			// { "data": "status" },
    			// { "data": "status" }
    			// ]
    			"aoColumns": [
    			{ "mData": "post_date" },
    			{ "mData": "category"},
    			{ "mData": "name"},
    			{ "mData": "description"},
    			{ 
    				"mData": null,
    				"bSortable":false,
    				"mRender": function (o) { 
    					if (o.type==1) {
    						return "Advertisement";
    					}else{
    						return "Request For Goods";
    					}
    				}
    			},
    			{ 
    				"mData": null,
    				"bSortable":false,
    				"mRender": function (o) { 
    					var curDate = new Date();
    					if (o.expiry_date<curDate) {
    						return "Advertisement Expired";
    					}else if (o.status==1){
    						return "Pending";
    					}else if (o.status==2){
    						return "Processing";
    					}else if (o.status==3){
    						return "Sold";
    					}else{
    						return "Add Posted";

    					}
    				}
    			},
    			{
    				"mData": null,
    				"bSortable":false,
    				"mRender": function (o) { 
    					var curDate = new Date();
    					if (o.expiry_date<curDate) {
    						return "<a href={{URL::to('/')}}/delete_post/"+o.id+"></a>";
    					}else if (o.status==1){
    						return "<a href={{URL::to('/')}}/delete_post/"+o.id+"><button class='btn btn-sm btn-danger'>Delete</button></a><a href={{URL::to('/')}}/sold_post/"+o.id+" style='margin-left:10px'><button class='btn btn-sm btn-success'>Sold</button></a>";
    					} else if(o.status==3){
    						return "<a href={{URL::to('/')}}/delete_post/"+o.id+"><button class='btn btn-sm btn-danger'>Delete</button></a>";
    					}
    				}
    			}
    			]    			
    		});
			} 
		});









	} );	
</script>
@endsection