<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halo</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
</head>

<body>

<form id="addCustomer" method="POST" action="">
        <textarea id="judul" cols="30" rows="10"></textarea>
        <input id="uid" name="uid" type="hidden" value="{{ \Session::get('uid') }}" class="form-control ">
    <button id="submitArtikel" type="submit"  class="btn btn-primary mb-2">Submit</button>
    </form>
    <!-- ck-editor -->
    <script>
	ClassicEditor
		.create( document.querySelector( '#judul' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>



    
</script>
</body>

</html>