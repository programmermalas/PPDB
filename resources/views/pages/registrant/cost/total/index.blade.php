@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Total Pembayaran</div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1.</td>
                        <td>Sumbangan Pengembangan Institusi</td>
                        <td class="text-right">Rp{{number_format($cost->institutional_development_contributions, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">2.</td>
                        <td>Sumbangan Wakaf</td>
                        <td class="text-right">Rp{{number_format($cost->donation, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">3.</td>
                        <td>Sarana dan Prasarana (2 Tahun pertama)</td>
                        <td class="text-right">Rp{{number_format($cost->facilities_and_infrastructure, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">4.</td>
                        <td>Syahriyah/SPP per bulan</td>
                        <td class="text-right">Rp{{number_format($cost->educational_assistance_donors, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">5.</td>
                        <td>Seragam</td>
                        <td class="text-right">Rp{{number_format($cost->uniform, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">6.</td>
                        <td>Biaya Pendidikan Satu Tahun</td>
                        <td class="text-right">Rp{{number_format(865000, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">7.</td>
                        <td>Paket Buku Satu Tahun</td>
                        <td class="text-right">Rp{{number_format(605000, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">8.</td>
                        <td>Biaya Administrasi</td>
                        <td class="text-right">Rp{{number_format(100000, 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td class="text-center">9.</td>
                        <td>Infaq</td>
                        <td class="text-right">Rp{{number_format($cost->infaq, 0, ',', '.')}},-</td>
                    </tr>
                </tbody>
                <tfoot class="font-weight-bold">
                    <tr>
                        <td colspan="2" class="text-center">Total</td>
                        <td class="text-right">Rp{{number_format($cost->total(), 0, ',', '.')}},-</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">Total yang harus dibayar 50%</td>
                        <td class="text-right">Rp{{number_format($cost->total() * 50 / 100, 0, ',', '.')}},-</td>
                    </tr>
                </tfoot>
            </table>
            <div>
                <p>Catatan:</p>
                <ol>
                    <li>Pembayaran bisa langsung lunas atau diangsur dengan rincian
                        <ol type="a">
                            <li>50% Dari total biaya dibayar saat daftar ulang</li>
                            <li>50% Berikutnya bisa diangsur sampai bulan November {{Carbon\Carbon::now()->format('Y')}}</li>
                        </ol>
                    </li>
                    <li>Syahriyah/SPP tahun ketiga dan kelima naik sebesar Rp 10.000,-</li>
                    <li>Infaq sarana dan prasarana pada tahun ketiga dan seterusnya menjadi Rp 15.000,- perbulan</li>
                </ol>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('home')}}" class="btn btn-sm btn-primary">Kembali ke beranda</a>
        </div>
    </div>
</div>
@endsection
