
function liking(evt) {
	 var keyword=evt.id;
	var myCheck=$('#'+keyword).val();
	if(myCheck=="like")$('#'+keyword).val("Unlike");
	if(myCheck=="Unlike")$('#'+keyword).val("like");
	$.ajax({
			url: 'likeadd.php',
			type: 'POST',
			data: {keyword:keyword},
			
		});
		
	
	}
	