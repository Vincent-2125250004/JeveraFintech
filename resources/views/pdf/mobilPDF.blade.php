<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mobil</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <style>
        * {
            font-family: monospace;
        }

        .kopPDF {
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }

        .kopPDF h1 {
            font-weight: bold;
            font-size: 24px;
            margin: 0;
        }

        hr {
            margin-top: 0;
            border-color: black;
        }

        .datamobil {
            height: auto;
            margin-top: 30px;
            padding-bottom: 50px;
            text-align: center;
            color: #000000;
            font-size: 15px;
        }

        .datamobil thead {
            background-color: #ACC8E5;
            color: #112A46;
            text-transform: uppercase;
        }

        .datamobil h1 {
            margin-bottom: 30px;
            font-weight: bold;
        }

        .content-table {
            margin-left: auto;
            margin-right: auto;
        }

        .content-table tbody tr td,
        .content-table thead th {
            border: 1px solid #000000;
            padding: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        a {
            text-decoration: none;
        }

        ul li {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <div class="kopPDF">
        <h1>{{ $title }}</h1>
        <h1>{{ $date }}</h1>
    </div>
    <hr class="solid">
    <div class="datamobil" style="margin-left: 15px; margin-right: 15px">

        <table class="content-table">
            <thead>
                <tr>
                    <th>Kode Mobil</th>
                    <th>Nomor Polisi</th>
                    <th>Nomor Lambung</th>
                    <th>Pemilik</th>
                    <th>Nomor Seri</th>
                    <th>Nomor Rangka</th>
                    <th>Nomor Mesin</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Data Dibuat</th>
                    <th>Data diUpdate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mobil->sortBy('ID_Mobil') as $mobils)
                    <tr class="tampil">
                        <td>{{ $mobils->ID_Mobil }}</td>
                        <td>{{ $mobils->Nomor_Polisi }}</td>
                        <td>{{ $mobils->Nomor_Lambung }}</td>
                        <td>{{ $mobils->Pemilik }}</td>
                        <td>{{ $mobils->Nomor_Seri }}</td>
                        <td>{{ $mobils->Nomor_Rangka }}</td>
                        <td>{{ $mobils->Nomor_Mesin }}</td>
                        <td>{{ $mobils->Tanggal_Masuk }}</td>
                        <td>{{ $mobils->Tanggal_Keluar }}</td>
                        <td>{{ $mobils->created_at->addHours(7) }}</td>
                        <td>{{ $mobils->updated_at->addHours(7) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
