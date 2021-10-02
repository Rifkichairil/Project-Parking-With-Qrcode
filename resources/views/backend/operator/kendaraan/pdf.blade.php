<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barcode Parkir</title>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 40%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
            padding: 2px 16px;
        }
    </style>
</head>
<body style="">
    <div class="card">
        <img src="data:image/png;base64, {!! base64_encode($qrcode) !!} ">
        <div class="container">
            <h4><b>{{$user->nama_civitas}}</b></h4>
            <p>{{$user->plat_nomor}}</p>
        </div>
    </div>

</body>
</html>
