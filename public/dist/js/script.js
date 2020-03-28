$(document).ready(function(){
	$('#image').on('change', function(){
		if(window.File && window.FileReader && window.FileList && window.Blob) {
			$('#thumb-output').html('');
			var data = $(this)[0].files;

			$.each(data, function(index, file){
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
					var fRead = new FileReader();
					fRead.onload = (function(file){
						return function(e) {
							var img = $('<img/>').addClass('thumb').attr('src', e.target.result);
							$('#thumb-output').append(img);
						};
					})(file);
					fRead.readAsDataURL(file);
				}
			});
		} else {
			alert("Your browser does not support File API!");
		}
	});
});