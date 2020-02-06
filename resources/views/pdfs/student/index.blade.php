
<!DOCTYPE html>
<html>
<head>
	<title>Rincian Biaya</title>
</head>
<body>
    <style type="text/css">
        * {
            font-size: 12px;
            margin-left: 30px;
        }
        table {
            width: 100%;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        h4 {
            margin: 5;
        }
        .body {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        .body tr th,
        .body tr td {
            border: 1px solid black;
        }
    </style>

    <div style="margin-bottom: 40px;">
        <h2 style="margin-bottom: 5px; margin-top: 5px;" class="text-center">RINCIAN BIAYA PENDAFTARAN PESERTA DIDIK BARU</h2>
        <h2 style="margin-bottom: 5px; margin-top: 5px;" class="text-center">SDIT CAHAYA UMMAT</h2>
        <h2 style="margin-bottom: 5px; margin-top: 5px;" class="text-center">TAHUN PELAJARAN {{Carbon\Carbon::now()->format('Y') }} / {{ Carbon\Carbon::now()->addYear()->format('Y') }}</h2>
    </div>

    <p style="margin-left: 0;"><b><i>Assalammualaikum Wr. Wb</i></b></p>
    <p>Dengan ini saya orang tua/wali dari peserta didik: </p>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$registration->name_of_candidate}}</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>{{$registration->place_of_birth}}, {{Carbon\Carbon::parse($registration->date_of_birth)->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <td>Asal TK</td>
            <td>:</td>
            <td>{{$registration->school_origin}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$registration->learner->address->village}} RT{{$registration->learner->address->neighborhood_association}}/RW{{$registration->learner->address->citizens_association}}</td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 30%;">No.Telp/Hp</td>
            <td style="vertical-align: top; width: 3%;">:</td>
            <td style="vertical-align: top;">
                <ul style="margin-top: 0;">
                    <li>
                        Ayah {{$registration->learner->father->phone}}
                    </li>
                    <li>Ibu {{$registration->learner->mother->phone}}</li>
                    <li>Wali {{$registration->learner->guardian->phone}}</li>
                </ul>
            </td>
        </tr>
    </table>

    <p>Mengatakan bahwa jika putra atau putri kami diterima di SDIT Cahaya Ummat, akan bersedia memberikan:</p>

    <table class="body">
        <thead>
            <tr>
                <th style="width: 5%;" class="text-center">No</th>
                <th style="width: 50%;">Nama</th>
                <th class="text-center">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1.</td>
                <td>Sumbangan Pengembangan Institusi</td>
                <td class="text-right">Rp{{number_format($registration->learner->cost->institutional_development_contributions, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">2.</td>
                <td>Sumbangan Wakaf</td>
                <td class="text-right">Rp{{number_format($registration->learner->cost->donation, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">3.</td>
                <td>Sarana dan Prasarana (2 Tahun pertama)</td>
                <td class="text-right">Rp{{number_format($registration->learner->cost->facilities_and_infrastructure, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">4.</td>
                <td>Syahriyah/SPP per bulan</td>
                <td class="text-right">Rp{{number_format($registration->learner->cost->educational_assistance_donors, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">5.</td>
                <td>Seragam</td>
                <td class="text-right">Rp{{number_format($registration->learner->cost->uniform, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">6.</td>
                <td>Biaya Pendidikan Satu Tahun</td>
                <td class="text-right">Rp{{number_format(865000, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">7.</td>
                <td>Biaya Administrasi</td>
                <td class="text-right">Rp{{number_format(100000, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">8.</td>
                <td>Biaya Administrasi</td>
                <td class="text-right">Rp{{number_format(100000, 0, ',', '.')}},-</td>
            </tr>
            <tr>
                <td class="text-center">9.</td>
                <td>Infaq</td>
                <td class="text-right">Rp{{number_format($registration->learner->cost->infaq, 0, ',', '.')}},-</td>
            </tr>
        </tbody>
        <tfoot class="font-weight-bold">
            <tr>
                <td colspan="2" class="text-center">Total</td>
                <td class="text-right">Rp{{number_format($total, 0, ',', '.')}},-</td>
            </tr>
        </tfoot>
    </table>

    <p>Demikian pernyataan dan kesediaan kami, harap menjadi periksa adanya.</p>
    
    <p style="margin-left: 0;"><b><i>Wassalammualaikum Wr. Wb</i></b></p>

    <p>Catatan:</p>
    <ol style="margin-left: 0;">
        <li>Pembayaran bisa langsung lunas atau diangsur dengan rincian
            <ol type="a">
                <li>50% Dari total biaya dibayar saat daftar ulang</li>
                <li>50% Berikutnya bisa diangsur sampai bulan November {{Carbon\Carbon::now()->format('Y')}}</li>
            </ol>
        </li>
        <li>Syahriyah/SPP tahun ketiga dan kelima naik sebesar Rp 10.000,-</li>
        <li>Infaq sarana dan prasarana pada tahun ketiga dan seterusnya menjadi Rp 15.000,- perbulan</li>
    </ol>

    <table>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;" class="text-center">
                Bergas, {{Carbon\Carbon::now()->format('d/m/Y')}}
                <br>
                Orang Tua/Wali Murid
                <br>
                <br>
                <br>
                <br>
                (_______________)
            </td>
        </tr>
    </table>

    <hr style="margin-top: 25px; margin-bottom: 25px;">
    
    <h2 class="text-center">PENDAFTARAN PESERTA DIDIK BARU</h2>

    <h2 class="text-center">TANDA TERIMA</h2>
    
    <p>Telah kami terima biaya daftar ulang dari:</p>

    <table>
        <tr>
            <td>Orang Tua / Wali Murid</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 30%;">Nominal</td>
            <td style="width: 3%;">:</td>
            <td>Rp 0,-</td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;" class="text-center">
                Bergas, {{Carbon\Carbon::now()->format('d/m/Y')}}
                <br>
                Tata Usaha
                <br>
                <br>
                <br>
                <br>
                (_______________)
            </td>
        </tr>
    </table>

</body>
</html>
