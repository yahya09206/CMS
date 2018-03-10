$(document).ready(function(){
	//Ckeditor
	ClassicEditor
		.create( document.querySelector( '#body' ) )
		.catch( error => {
		    console(error);
		});
	//SELECT ALL CHECKBOXES
	$('#selectAllBoxes').click(function(event){
		if (this.checked) {
			$('.checkBoxes').each(function(){
				this.checked = true;
			});
		}else{
			$('.checkBoxes').each(function(){
				this.checked = false;
			});
		}
	});
	//LOADER JS
	var div_box = "<div id='load-screen'><div id='loading'></div></div>"
	//append to body
	$("body").prepend(div_box);
	//remove loader
	$("#load-screen").deley(700).fadeOut(600, function(){
		$(this).remove();
	});
});