function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#friending_id').val();
	alert("ehlo");
	if (keyword.length > min_length) {
		$.ajax({
			url: 'searchall.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#friends_id').show();
				$('#friend_list_id').html(data);
			}
		});
	} else {
		$('#friend_list_id').hide();
	}
}
function set_item(item) {
	// change input value
	$('#friends_id').val(item);
	$('#helli').hide();
}