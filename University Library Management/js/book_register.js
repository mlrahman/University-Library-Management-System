// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#id2').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_book_register.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#book_register').show();
				$('#book_register').html(data);
			}
		});
	} else {
		$('#registry_book_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#id2').val(item);
	// hide proposition list
	$('#book_register').hide();
}