// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'najax_book.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#book_list_id').show();
				$('#book_list_id').html(data);
			}
		});
	} else {
		$('#book_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#id').val(item);
	// hide proposition list
	$('#book_list_id').hide();
}