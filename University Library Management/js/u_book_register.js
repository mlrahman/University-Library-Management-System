// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#id1').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_u_book_register.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#u_book_register').show();
				$('#u_book_register').html(data);
			}
		});
	} else {
		$('#user_registry_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#id1').val(item);
	// hide proposition list
	$('#u_book_register').hide();
}