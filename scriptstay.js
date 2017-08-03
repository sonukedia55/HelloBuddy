var cou=0;
var did=0;


function hellog(evt) {
	 var keyword=evt.id;
	var did=0;

	$.ajax({
			url: 'searchdrop.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){

				$('#'+keyword+'a').show();
				cou=keyword;
				$('#'+keyword+'a').html(data);
				did=1;
				$('#drpl').show();

			}
		});

	}
