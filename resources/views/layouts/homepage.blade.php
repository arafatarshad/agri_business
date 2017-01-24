@extends('layouts.admin')
@section('title','DashBoard')
@section('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
@section('content')
<!-- ***************************************date range*********************************** -->
<div class="row" style="margin-bottom:20px"> 
	<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
		<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
		<span></span> <b class="caret"></b>
	</div>
</div>
<!-- *************************************************************************************** -->
<!-- *************************************************************************************** -->	

<div class="row">
	<div class="col-lg-12">
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th style="width: 15%">Visitor Name</th>
					<th style="width: 15%">Contact</th>
					<th style="width: 15%">Arrival</th>
					<th style="width: 15%">Departure</th>
					<th style="width: 15%">Host</th>
					<th style="width: 15%">Photo</th>
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
	$(function() {
		var start = moment().subtract(29, 'days');
		var end = moment();
		function cb(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			addNewManufacturer();
		}
		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);
		cb(start, end);    
	});
</script>
<!-- this is to get the value of daterange send it to api and recieve data -->
<script type="text/javascript">
	function addNewManufacturer() {
		var from = $("#reportrange span").text().split('-')[0];
		var to = $("#reportrange span").text().split('-')[1];
		var sendInfo = {
			from: from,
			to: to,
		};

		// $.ajax({
		// 	type: "GET",
		// 	url: "{{URL::to('/')}}/getallvisitorsforthisdaterange",
		// 	dataType: "json",
		// 	success: function (msg) {
		// 		alert(msg);
		// 	},
		// 	data: sendInfo
		// });
	// });		

		var jqxhr = $.get( "{{URL::to('/')}}/getallvisitorsforthisdaterange",
			{ from: from,to:to },
			function(data) { 
				var t = $('#example').DataTable();
				t.clear();
				for (i = 0; i < data.length; i++) {
					t.row.add( [
						data[i].name,
						data[i].phone,
						data[i].arrival_time,
						data[i].exit_time,
						data[i].resident_name,
						data[i].photo,
						] ).draw( false );
				}
			});


}


$(document).ready(function() {

} );	
</script>
@endsection