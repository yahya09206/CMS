$(document).ready(function(){
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

	//Ckeditor
	// ClassicEditor
	// 	.create( document.querySelector( '#body' ) )
	// 	.catch( error => {
	// 	    console.log(error);
	// 	});
});