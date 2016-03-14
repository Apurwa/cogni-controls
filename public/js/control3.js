$(document).ready(function(){
	$('.allot').click(function(){
		$(".loading").show();
		var id = $(this).attr('id');
		var data = {
			caution: $('#caution_'+id).is(':checked'),
			bhawan: $('#bhawan_'+id).val(),
			room_no: $('#room_'+id).val(),
			receipt_id: id
		};

		console.log(data);

		$.post('/c3-submit', data, function(response, status){
			$(".loading").hide();
			if (status == 'success'){
				if (response == 'success'){
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