<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Journal Voucher Pemasukan</title>
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

        .data {
            height: auto;
            margin-top: 10px;
            align-content: center;
            text-align: center;
            color: #000000;
            font-size: 15px;
        }

        .data thead {
            background-color: #ACC8E5;
            color: #112A46;
            align-items: center;
            text-align: center;
            align-content: center;
            text-transform: uppercase;
        }

        .data h1 {
            margin-bottom: 30px;
            font-weight: bold;
        }

        .content-table {
            width: 100%;
            align-items: center;
            align-content: center;
            margin-left: auto;
            margin-right: auto;
        }

        .content-table tbody tr td,
        .content-table thead th,
        .content-table tfoot tr td {
            border: 1px solid #000000;
            padding: 10px;
            width: 100px;
            align-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .content-table tfoot tr {
            background-color: #ACC8E5;
            font-weight: bold;
        }

        .tableInvis {
            padding: 20px;
            width: 100%;
        }

        .tableInvis .kolom1 {
            width: 50%;
        }

        .tableInvis .kolom2 {
            width: 50%;
        }

        .tableInvis .kolom3 {
            width: 50%;
        }

        .ttd {
            margin-top: 20px;
            padding-left: 20px;
            text-align: left;
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

    <table class="tableInvis">
        <tbody>
            <tr>
                <td class="kolom1">Kontak : {{ $pemasukan->Nama_Kontak }}</td>
                <td class="kolom2">Tanggal : {{ $pemasukan->Tanggal_Pemasukan }}</td>
            </tr>
            <tr>
                <td class="kolom1">Nomor Referensi : {{ $pemasukan->Nomor_Referensi }}</td>
            </tr>
            <tr>
                <td colspan="2" class="kolom1">Keterangan : {{ $pemasukan->Deskripsi }}</td>
            </tr>
        </tbody>
    </table>


    <div class="data" style="margin-left: 15px; margin-right: 15px">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Nama Akun</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $pemasukan->KeAkun->Nama_Akun }}</td>
                    <td>Rp{{ number_format($pemasukan->Nominal_Pemasukan, 0, ',', '.') }}</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>{{ $pemasukan->DariAkun->Nama_Akun }}</td>
                    <td>-</td>
                    <td>Rp{{ number_format($pemasukan->Nominal_Pemasukan, 0, ',', '.') }}</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td>Rp{{ number_format($pemasukan->Nominal_Pemasukan, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($pemasukan->Nominal_Pemasukan, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <table class="tableInvis">
        <tbody>
            <tr>
                <td class="kolom1">Dicetak pada tanggal {{ $date }}</td>
                <td class="kolom2"></td>
                <td class="kolom3"></td>

            </tr>
            <tr>
                <td class="kolom1">Dicetak oleh : {{ Auth::user()->name }}</td>
                <td class="kolom2">Diketahui</td>
                <td class="kolom3">Penerima</td>
            </tr>
            <tr>
                <td class="kolom1"><br></td>
                <td class="kolom2"><br> </td>
                <td class="kolom3"><br> </td>
            </tr>
            <tr>
                <td class="kolom1"><br> </td>
                <td class="kolom2"><br> </td>
                <td class="kolom3"><br> </td>
            </tr>
            <tr>
                <td class="kolom1"><br> </td>
                <td class="kolom2"><br> </td>
                <td class="kolom3"><br> </td>
            </tr>
            <tr>
                <td class="kolom1"><br> </td>
                <td class="kolom2"><br> </td>
                <td class="kolom3"><br> </td>
            </tr>
            <tr>
                <td class="kolom1">__________________________</td>
                <td class="kolom2">__________________________</td>
                <td class="kolom3">__________________________</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
