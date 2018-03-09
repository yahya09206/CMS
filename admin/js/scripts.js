$(document).ready(function(){

	//Ckeditor
	ClassicEditor
		.create( document.querySelector( '#body' ) )
		.catch( error => {
		    console.error( error );
	});
});