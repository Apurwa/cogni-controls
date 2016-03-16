$(document).ready(function(){
	$('.allot').click(function(){
		$(".loading").show();
		var id = $(this).attr('id');
		var data = {
			kit_issued: $('#kit_'+id).is(':checked'),
			id_issued: $('#id_'+id).is(':checked'),
			receipt_id: id
		};

		//console.log(data);

		$.post('/c2-submit', data, function(response, status){
			$(".loading").hide();
			if (status == 'success'){
				if (response == 'success'){
					if (data.kit_issued || data.id_issued){
						$('#row_'+id).fadeOut();
					}
				} else
					$('#info').append('<br /><div class="alert alert-danger">'+response+'</div>');				
			} else
					$('#info').append('<br /><div class="alert alert-danger">Error in submitting the data.</div>');
		});
	});

	$('.refresh').click(function(){
		location.reload();
	});
	
});