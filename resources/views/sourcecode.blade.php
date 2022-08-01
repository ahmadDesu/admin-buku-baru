<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Admin Buku</title>

</head>
<body style="background-color:#cfd1d4">

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">

    <h4 class="text-center">Admin Buku Pemprograman</h4><br>

    <h5># Add Source Code</h5>
    <form id="addCustomer" method="POST" action="">
    <!-- Deskripsi -->
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi" required autofocus>
    </div>

    <!-- Link tutor -->
    <div class="mb-3">
        <label for="link_tutor" class="form-label">Link Tutorial</label>
        <input type="text" class="form-control" id="link_tutor" name="link_tutor" placeholder="Link Tutorial" required autofocus>
    </div>

    <!-- Link website -->
    <div class="mb-3">
        <label for="link_web" class="form-label">Link website</label>
        <input type="text" class="form-control" id="link_web" name="link_web" placeholder="Link website">
    </div>

    <!-- Pdf -->
    <div class="mb-3">
        <label for="pdf" class="form-label">Link Thumbnail</label>
        <input type="text" class="form-control" id="pdf" name="konten1" placeholder="Link Thumbnail">
    </div>
    
    <input id="uid" name="uid" type="hidden" value="{{ \Session::get('uid') }}" class="form-control ">
    <button id="submitArtikel" type="button"  class="btn btn-primary mb-2">Submit</button>
    </form>


    

{{--Firebase Tasks--}}
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var lastIndex = 0;
    // Get Data
    firebase.database().ref('SourceCode/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
        		<td>' + value.deskripsi + '</td>\
                <td>' + value.link_tutor + '</td>\
                <td>' + value.link_web + '</td>\
        		<td>' + value.pdf + '</td>\
        		<td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
        		<button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' + index + '">Delete</button></td>\
        	</tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitUser").removeClass('desabled');
    });
    // Add Data
    $('#submitArtikel').on('click', function () {
        var values = $("#addCustomer").serializeArray();
        var deskripsi = values[0].value;
        var link_tutor = values[1].value;
        var link_web = values[2].value;
        var pdf = values[3].value;
        
        var userID = lastIndex + 1;
        console.log(values);
        // Disini kita menambahkan nama untuk folder di database
        firebase.database().ref('SourceCode/' + userID).set({
            
            deskripsi: deskripsi,
            link_tutor: link_tutor,
            link_web: link_web,
            pdf: pdf,

        });
        // Reassign lastID value
        lastIndex = userID;
        $("#addCustomer input").val("");
    });
    
    
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>