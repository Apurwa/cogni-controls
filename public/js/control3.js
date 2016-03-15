// this could have been merged with control2.js, but in future it might get dirtier on adding further features.

$(document).ready(function(){
	$('.allot').click(function(){
		$(".loading").show();
		var id = $(this).attr('id');
		var data = {
			bhawan: $('#bhawan').val(),
			room_no: $('#room_no').val(),
			available: $('#available').val(),
			caution: $('#caution_'+id).is(':checked'),
			receipt_id: id
		};

		console.log(data);

		$.post('/c3-submit', data, function(response, status){
			$(".loading").hide();
			if (status == 'success'){
				if (response == 'success'){
					$('#info').html('<div class="alert alert-success"> Room allotted: '+data.room_no+' ('+data.bhawan+')</div>');				
					if (data.caution){
						$('#row_'+id).fadeOut();
					}
				} else
					$('#info').append('<br /><div class="alert alert-danger">'+response+'</div>');				
			} else
					$('#info').append('<br /><div class="alert alert-danger">Error in submitting the data.</div>');
		});

	});
});