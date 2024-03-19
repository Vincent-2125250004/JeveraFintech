<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Delivery Order</title>
    <!-- Menggunakan Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        * {
            font-family: monospace;
        }

        .kop-surat {
            padding: 20px;
            border-bottom: 2px solid #333;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .judul {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
        }

        .alamat {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .info-kontak {
            font-size: 14px;
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
    <div class="kop-surat">
        <img class="logo" src="{{ $image }}" alt="Logo Perusahaan">
        <div class="info-perusahaan">
            <div class="judul">{{ $title }}</div>
            <div class="alamat">{{ $alamat }}</div>
            <div class="info-kontak">Email: {{ $email }}</div>
        </div>
    </div>
    <hr class="solid">
    <div class="datamobil" style="margin-left: 15px; margin-right: 15px">

        <table class="content-table">
            <thead>
                <tr>
                    <th>No. DO</th>
                    <th>Tanggal DO</th>
                    <th>Nomor Polisi</th>
                    <th>Nomor Lambung</th>
                    <th>SJB Muat</th>
                    <th>SJB Bongkar</th>
                    <th>Rute</th>
                    <th>Tonase</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($do->sortBy('id') as $dos)
                    <tr class="tampil">
                        <td>{{ $dos->NO_Do }}</td>
                        <td>{{ $dos->Tanggal_Do }}</td>
                        <td>{{ $dos->Nomor_Polisi }}</td>
                        <td>{{ $dos->Nomor_Lambung }}</td>
                        <td>{{ $dos->SJB_Muat }}</td>
                        <td>{{ $dos->SJB_Bongkar }}</td>
                        <td>{{ $dos->rute->Asal_Rute }} - {{ $dos->rute->Tujuan_Rute }} {{ $dos->rute->Gerbang }} {{ $dos->rute->Kilometer_Rute }}KM </td>
                        <td>{{ $dos->Tonase }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
