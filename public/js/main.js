var arr;
$(document).ready(function(){

	// control-1 search and verify participants
	$('#search').click(function(){

		$(".c1-success").hide();
		$('.c1-tables').show();
		$(".loading").show();
		var cogni_ids = [];
		cogni_ids.push( $("#cogni_id_search").val() );

		$.ajax({
		   url: '/check-cogni-id',
		   data: {
		      cogni_ids: cogni_ids
		   },
		   success: function(data) {
		   	$('.loading').hide();
		   	//$('#info').html(data);
		   	show_data(data);
		   },
		   error: function(x, status, msg) {
		   		$('.loading').hide();
		      $('#info').append('[Ajax request failed] '+status+': '+msg);
		   },
		   type: 'GET'
		});

	});

	// submit on control-1
	$('#c1_submit').click(function(){

		$(".loading").show();
		var c1_data = [];
		for (var i = 0; i < arr.length; i++) {
			var noc = true, college_id = true;
			if ( !$('#noc_'+(i+1)).is(':checked') )
				noc = false;
			if ( !$('#college_id_'+(i+1)).is(':checked') )
				college_id = false;
			
			c1_data.push({cogni_id: arr[i].cogni_id, ticket_id: arr[i].ticket_id, noc: noc, college_id: college_id});
		};
		c1_data_json = JSON.stringify(c1_data);
		$.post('/c1-submit', {c1_data: c1_data_json}, function(response, status){
			$(".loading").hide();
			if(status == 'success'){
				if (response == 'success'){					
					$('.c1-success').show();
					$('.c1-success span').html(c1_data.length);
					$('.c1-tables').hide();
					$('.payments-check tr').slice(1).remove();
					$('.c1-details tr').slice(1).remove();
				} else
					$('#info').append('<br /><div class="alert alert-danger">'+response+'</div>');				
			} else
				$('#info').append('<br /><div class="alert alert-danger">Error in submitting the data.</div>');
		});
	});

});

function show_data(data){
	$('#info').html('[ All connections displayed. ]');
  arr = JSON.parse(data);
  var amount = 0;
	for (var i = 0; i < arr.length; i++) {
		$('.payments-check').append('<tr><td><input type="text" class="form-control" placeholder="Cogni-ID" id="cogni_id_'+(i+1)+'" value="'+arr[i].cogni_id+'" disabled></td><td><input type="checkbox" class="form-control" name="noc" value="1" id="noc_'+(i+1)+'"></td><td>'+arr[i].name+'</td><td>'+arr[i].college+'</td><td><input type="text" name="events" value="'+arr[i].events+'" class="form-control"></td><td><input type="checkbox" class="form-control" name="college_id" value="1" id="college_id_'+(i+1)+'"></td></tr>');
		$('.c1-details').append('<tr><td>'+arr[i].cogni_id+'</td><td><input type="text" class="form-control" placeholder="ticket-id" id="ticket_id_'+(i+1)+'" value="'+arr[i].ticket_id+'" disabled></td><td>'+arr[i].type+'</td><td>'+arr[i].cost+'</td></tr>');
		amount += parseInt(arr[i].cost);
	}
	$('#info').append('[ Total Amount on receipt: <b>Rs. '+amount+'</b>. ]');
}