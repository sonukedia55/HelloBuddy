function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#friend_id').val();
	if (keyword.length > min_length) {
		$.ajax({
			url: 'searchtest.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#friend_list_id').show();
				$('#friend_list_id').html(data);
			}
		});
	} else {
		$('#friend_list_id').hide();
	}
}
function completes() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#friend_id').val();
	if (keyword.length > min_length) {
		$.ajax({
			url: 'searchall.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#friend_list_id').show();
				$('#friend_list_id').html(data);
			}
		});
	} else {
		$('#friend_list_id').hide();
	}
}
 
function tocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#friend_list').val();
	if (keyword.length > min_length) {
		$.ajax({
			url: 'searchppt.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#friend_list_list').show();
				$('#friend_list_list').html(data);
			}
		});
	} else {
		$('#friend_list_list').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item,item2) {
	// change input value
	$('#friend_list').val(item);
	$('#get_id').val(item2);
	// hide proposition list
	$('#friend_list_list').hide();
}
	
	$("document").ready(function(){
	var chhk=0;
	$("#mennu").hide(00);
	$("#menuicon").click(function(){
	if(chhk==0) {
		$("#mennu").show(00); chhk=1;}
	else {
		$("#mennu").hide(00); chhk=0;}
			});
});

function typingtest() {
	var min_length=0;
	var keyword = $('#typingto').val();
	var chcker = $('#reeply').val();
	if (chcker.length > min_length) {
		$.ajax({
			url: 'searchtype.php',
			type: 'POST',
			data: {keyword:keyword},
		});
	} else{
		$.ajax({
			url: 'searchtypeno.php',
			type: 'POST',
			data: {keyword:keyword},
		});
		
	}
}

	

