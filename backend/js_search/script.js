$(document).ready(function() {

	// hilangkan tombol
	$('#tombol-cari').hide();

	// ebvent ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		// munculkan icon loading
		$('.loader').show();


		// ajax menggunakan load
		// $('#container').load('ajax/film.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('ajax/film.php?keyword=' + $('#keyword').val(), function(data) {
			$('#container').html(data);
			$('.loader').hide();


		})

	});

});