@section('title','GuestRecord')
@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
	.resident_and_guest_info{
		display: none;
	}
	.resident_and_guest_info .row{
		margin-top: 20px;
	}
	.resident_and_guest_info .col-lg-6{
		margin-bottom: 10px;
	}
	.session-message{
		background: red;
	}
</style>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="session-message">
			
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="ui-widget">
			<label for="name" class="col-lg-3">Name: </label>
			<input id="name" class="col-lg-6">
		</div>
	</div>
	<div class="col-lg-6">
		<button class="btn btn-default btn-info " id="showrecords"> See Records</button>
	</div>
</div>
<div class="resident_and_guest_info"> 
	<h1 class="text-center">Resident Info</h1>
	<div class="row resident_info">
		<div class="col-lg-6">
			<label for="name" class="col-lg-3">Name</label>
			<input type="text" class="col-lg-8" value="" id="resident_name" readonly>
		</div>
		<div class="col-lg-6">
			<label for="Flat No" class="col-lg-3">Flat No.</label>
			<input type="text" class="col-lg-8" value="" id="resident_flat" readonly>
		</div>	
		<div class="col-lg-6">
			<label for="Floor No" class="col-lg-3">Floor No.</label>
			<input type="text" class="col-lg-8" value="" id="resident_floor" readonly>
		</div>	
		<div class="col-lg-6">
			<label for="Floor No" class="col-lg-3">Building No.</label>
			<input type="text" class="col-lg-8" value="" id="resident_building" readonly>
		</div>	

	</div>
	<div class="row guestinfo" >
		<h1 class="text-center">Guests to this Resident</h1>
		<div class="col-lg-12">
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th style="width: 15%">Visitor Name</th>
						<th style="width: 15%">Contact</th>
						<th style="width: 15%">Arrival</th>
						<th style="width: 15%">Departure</th> 
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
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>






@endsection

@section('scripts')
<script>
	$(function() {
		$( "#name" ).autocomplete({
			source: '{{URL::to('/')}}//gethostnames'
		});
	});

	$(document).ready(function(){
		$('#showrecords').on('click',function(){
			if ($('#name').val()=="") {
				
				$('.session-message').html("");
				$('.session-message').append("Insert Name Of The Resident");
				// $('.session-message').css("background","red");
				$('.session-message').css("display","block");
			}else{
				$('.session-message').css("display","none");
				$('.session-message').html("");
				getdatausinginputvalue();
			}	

		});
});//end of document ready

	function getdatausinginputvalue(){
		var name=$('#name').val();
		var jqxhr = $.get( "{{URL::to('/')}}/guestrecords",
			{ userinput:name},
			function(data) {
				var t = $('#example').DataTable(); 
				if (data.length>0) {
					//ad basic information of the resident 
					$('#resident_name').val(data[0].resident_name);
					$('#resident_flat').val(data[0].flat);
					$('#resident_floor').val(data[0].floor);
					$('#resident_building').val(data[0].building);
					//Draw the datatable
					$('.resident_and_guest_info').css('display','block');
					t.clear();
					for (i = 0; i < data.length; i++) {
						t.row.add( [
							data[i].name,
							data[i].phone,
							data[i].arrival_time,
							data[i].exit_time, 
							data[i].photo,
							] ).draw( false );
					}
				}else{
					$('.session-message').html("");
					$('.session-message').append("No such Records");
					$('.resident_and_guest_info').css('display','none');
					$('.session-message').css('display','block');
				}


				console.log(data);


			});
	}
</script>
@endsection