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
	
});