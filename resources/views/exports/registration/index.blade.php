<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Asal Sekolah</th>
            <th>Nominal</th>
            <th>Sumbangan Pengembangan Institusi</th>
            <th>Infaq Wakaf Tanah</th>
            <th>Infaq Sarana dan Prasarana/Bulan</th>
            <th>SPP/Bulan</th>
            <th>Seragam</th>
            <th>Pendidikan</th>
            <th>Paket Buku</th>
            <th>Administrasi</th>
            <th>Infaq</th>
        </tr>
    </thead>
    @php
        $no = 0;
    @endphp
    <tbody>
        @foreach ($registrations as $registration)
        <tr>
            <th>{{++$no}}</th>
            <th>{{$registration->name_of_candidate ?? null}}</th>
            <th>{{$registration->place_of_birth ?? null}}, {{$registration->date_of_birth ? Carbon\Carbon::parse($registration->date_of_birth)->format('d/m/Y') : null}}</th>
            <th>{{$registration->learner->personal->gender ? ($registration->learner->personal->gender == 'boy' ? 'l' : 'p') : null}}</th>
            <th>{{$registration->school_origin ?? null}}</th>
            <th>{{$registration->nominal ?? null}}</th>
            <th>{{$registration->learner->cost->institutional_development_contributions ?? null}}</th>
            <th>{{$registration->learner->cost->donation ?? null}}</th>
            <th>{{$registration->learner->cost->facilities_and_infrastructure ?? null}}</th>
            <th>{{$registration->learner->cost->educational_assistance_donors ?? null}}</th>
            <th>{{$registration->learner->cost->uniform ?? null}}</th>
            <th>865000</th>
            <th>605000</th>
            <th>100000</th>
            <th>{{$registration->learner->cost->infaq ?? null}}</th>
        </tr>
        @endforeach
    </tbody>
</table>