    $('.addbrand').click(function(e){
			e.preventDefault();
	       $.get('addbrand',function(data){
				$('#addbrand').modal('show')
			 		.find('#addbrandContent')
			 		.html(data);
        });
	});