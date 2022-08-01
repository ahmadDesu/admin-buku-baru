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

        <h5># Add Artikel HTML</h5>
        <form id="addCustomer" method="POST" action="">
            <!-- Judul -->
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul" required autofocus>
            </div>

            <!-- Link time -->
            <div class="mb-3">
                <label for="time" class="form-label">Tanggal</label>
                <input type="text" class="form-control" id="time" name="time" placeholder="Masukan Tanggal" required autofocus>
            </div>

            <!-- Youtube -->
            <div class="mb-3">
                <label for="youtube" class="form-label">Youtube</label>
                <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Link Youtube">
            </div>

            <!-- Konten 1 -->
            <div class="mb-3">
                <label for="konten1" class="form-label">Artikel 1</label>
                <input type="text" class="form-control" id="konten1" name="konten1" placeholder="Artikel 1">
            </div>
            <!-- Kode 1  -->
            <label for="kode-1" class="form-label">Kode 1</label>
            <br>
            <textarea id="kode1" name="kode1" rows="5" cols="148" placeholder="Kode 1"></textarea>
            <!-- Foto konten 1 -->
            <div class="mb-3">
                <label for="foto_konten3" class="form-label">Foto konten 1</label>
                <input type="text" class="form-control" id="form" name="foto_konten1" placeholder="Link foto konten 1">
            </div>

            <!-- Konten 2 -->
            <div class="mb-3">
                <label for="artikel2" class="form-label">Artikel 2</label>
                <input type="text" class="form-control" id="form" name="konten2" placeholder="Artikel 2">
            </div>
            <!-- Kode 2 -->
            <label for="kode-2" class="form-label">Kode 2</label>
            <br>
            <textarea id="kode2" name="kode2" rows="5" cols="148" placeholder="Kode 2"></textarea>
            <!-- Foto konten 2 -->
            <div class="mb-3">
                <label for="foto_konten2" class="form-label">Foto konten 2</label>
                <input type="text" class="form-control" id="form" name="foto_konten2" placeholder="Link foto konten 2">
            </div>

            <!-- Konten 3 -->
            <div class="mb-3">
                <label for="artikel3" class="form-label">Artikel 3</label>
                <input type="text" class="form-control" id="form" name="konten3" placeholder="Artikel 3">
            </div>
            <!-- Kode 3  -->
            <label for="kode-3" class="form-label">Kode 3</label>
            <br>
            <textarea id="kode3" name="kode3" rows="5" cols="148" placeholder="Kode 3"></textarea>
            <!-- Foto konten 3 -->
            <div class="mb-3">
                <label for="foto_konten3" class="form-label">Foto konten 3</label>
                <input type="text" class="form-control" id="form" name="foto_konten3" placeholder="Link foto konten 3">
            </div>

            <!-- Konten 4 -->
            <div class="mb-3">
                <label for="artikel4" class="form-label">Artikel 4</label>
                <input type="text" class="form-control" id="form" name="konten4" placeholder="Artikel 4">
            </div>
            <!-- Foto konten 4 -->
            <div class="mb-3">
                <label for="img" class="form-label">Foto konten 4</label>
                <input type="text" class="form-control" id="form" name="img" placeholder="Link foto konten 4">
            </div>

            <!-- Konten 5  -->
            <div class="mb-3">
                <label for="artikel5" class="form-label">Artikel 5</label>
                <input type="text" class="form-control" id="form" name="konten5" placeholder="Artikel 5">
            </div>

            <input id="uid" name="uid" type="hidden" value="{{ \Session::get('uid') }}" class="form-control ">
            <button id="submitArtikel" type="button" class="btn btn-primary mb-2">Submit</button>
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
            firebase.database().ref('HtmlDatabase/').on('value', function(snapshot) {
                var value = snapshot.val();
                var htmls = [];
                $.each(value, function(index, value) {
                    if (value) {
                        htmls.push('<tr>\
        		<td>' + value.judul + '</td>\
                <td>' + value.time + '</td>\
                <td>' + value.youtube + '</td>\
        		<td>' + value.konten1 + '</td>\
                <td>' + value.konten2 + '</td>\
                <td>' + value.konten3 + '</td>\
                <td>' + value.konten4 + '</td>\
                <td>' + value.konten5 + '</td>\
                <td>' + value.kode1 + '</td>\
                <td>' + value.kode2 + '</td>\
                <td>' + value.kode3 + '</td>\
                <td>' + value.foto_konten1 + '</td>\
                <td>' + value.foto_konten2 + '</td>\
                <td>' + value.foto_konten3 + '</td>\
                <td>' + value.img + '</td>\
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
            $('#submitArtikel').on('click', function() {
                var values = $("#addCustomer").serializeArray();
                var judul = values[0].value;
                var time = values[1].value;
                var youtube = values[2].value;

                var konten1 = values[3].value;
                var kode1 = values[4].value;
                var foto_konten1 = values[5].value;

                var konten2 = values[6].value;
                var kode2 = values[7].value;
                var foto_konten2 = values[8].value;

                var konten3 = values[9].value;
                var kode3 = values[10].value;
                var foto_konten3 = values[11].value;

                var konten4 = values[12].value;
                var img = values[13].value;

                var konten5 = values[14].value;


                var userID = lastIndex + 1;
                console.log(values);
                // Disini kita menambahkan nama untuk folder di database
                firebase.database().ref('HtmlDatabase/' + userID).set({
                    judul: judul,
                    time: time,
                    youtube: youtube,

                    konten1: konten1,
                    konten2: konten2,
                    konten3: konten3,
                    konten4: konten4,
                    konten5: konten5,

                    kode1: kode1,
                    kode2: kode2,
                    kode3: kode3,

                    img: img,
                    foto_konten1: foto_konten1,
                    foto_konten2: foto_konten2,
                    foto_konten3: foto_konten3,
                });
                // Reassign lastID value
                lastIndex = userID;
                $("#addCustomer input").val("");
            });
        </script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>