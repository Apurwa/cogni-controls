// this could have been merged with control2.js, but in future it might get dirtier on adding further features.

$(document).ready(function(){
	show_room_no(); // initially all rooms are hidden, so show the corresponding room numbers
	$('#bhawan').change(function(){
		$('.room_no').hide();
		show_room_no();		
	});

	$('.allot').click(function(){
		$(".loading").show();
		var id = $(this).attr('id');		
		var data = {
			bhawan: $('#bhawan').val(),
			room_no: $('#room_no').val(),
			caution: $('#caution_'+id).is(':checked'),
			receipt_id: id
		};

		//console.log(data);

		if (data.caution){
			$.post('/c3-submit', data, function(response, status){
				$(".loading").hide();
				if (status == 'success'){
					if (response == 'success'){
						var room_no_text = $('#room_no option:selected').text().split('#');
						var availability = room_no_text[1] - 1; // the text value of the option shows the availability of beds after '#'
						//console.log(room_no_text[0]+'#'+availability);
						$('#room_no option:selected').text(room_no_text[0]+'#'+availability);
						$('#info').html('<div class="alert alert-success"> Room allotted: '+data.room_no+' ('+data.bhawan+')</div>');				
						$('.default_room_no').prop('selected', true);
						$('#row_'+id).fadeOut();
					} else
						$('#info').append('<br /><div class="alert alert-danger">'+response+'</div>');
				} else
						$('#info').append('<br /><div class="alert alert-danger">Error in submitting the data.</div>');
			});
		} else{
			$('#info').html('<br /><div class="alert alert-danger">Please take caution money before alloting the rooms.</div>');
			alert('Please take caution money before alloting the rooms.');
			$(".loading").hide();
		}
	});

	$('.refresh').click(function(){
		location.reload();
	});

});

function show_room_no(){
	var bhawan = $('#bhawan').val();
	$('.'+bhawan).show();	
}