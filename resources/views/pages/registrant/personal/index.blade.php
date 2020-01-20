@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.registration.index')}}"></a>Registrasi</li>
                    <li class="breadcrumb-item active" aria-current="page">Pribadi</li>
                    <li class="breadcrumb-item active"><a href="#">Alamat</a></li>
                    <li class="breadcrumb-item active"><a href="#">Detail</a></li>
                    <li class="breadcrumb-item active"><a href="#">Ayah</a></li>
                    <li class="breadcrumb-item active"><a href="#">Ibu</a></li>
                    <li class="breadcrumb-item active"><a href="#">Wali</a></li>
                    <li class="breadcrumb-item active"><a href="#">Priodik</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    Pribadi
                </div>

                <form action="{{route('registrant.personal.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$learner->id ?? null}}">

                        <div class="form-group">
                            <label for="date" class="col-form-label-sm">Tanggal <span class="text-danger">*01/01/2001</span></label>

                            <input type="text" name="date" id="date" class="form-control form-control-sm @if ($errors->has('date')) is-invalid @endif" value="{{!empty($learner->date) ?  Carbon\Carbon::parse($learner->date)->format('d/m/Y') : old('date')}}" placeholder="Masukan tanggal disini">

                            @if ($errors->has('date'))
                            <div class="invalid-feedback">
                                {{$errors->first('date')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-form-label-sm">Nama Lengkap</label>

                            <input type="text" name="name" id="name" class="form-control form-control-sm @if ($errors->has('name')) is-invalid @endif" value="{{$learner->personal->name ?? old('name')}}" placeholder="Masukan nama lengkap disini">

                            @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nick" class="col-form-label-sm">Nama Panggilan</label>

                            <input type="text" name="nick" id="nick" class="form-control form-control-sm @if ($errors->has('nick')) is-invalid @endif" value="{{$learner->personal->nick ?? old('nick')}}" placeholder="Masukan nama panggilan disini">

                            @if ($errors->has('nick'))
                            <div class="invalid-feedback">
                                {{$errors->first('nick')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>

                            <select name="gender" id="gender" class="custom-select custom-select-sm">
                                <option value="boy" {{ (old('gender') ?? !empty($learner->personal->gender)) === 'boy' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="girl" {{ (old('gender') ?? !empty($learner->personal->gender)) === 'girl' ? 'selected' : '' }}>Permpuan</option>
                            </select>

                            @if ($errors->has('gender'))
                            <div class="invalid-feedback">
                                {{$errors->first('gender')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="number_family_card" class="col-form-label-sm">No. Kartu Keluarga</label>

                            <input type="text" name="number_family_card" id="number_family_card" class="form-control form-control-sm @if ($errors->has('number_family_card')) is-invalid @endif" value="{{$learner->personal->number_family_card ?? old('number_family_card')}}" placeholder="Masukan no. kartu keluarga disini">

                            @if ($errors->has('number_family_card'))
                            <div class="invalid-feedback">
                                {{$errors->first('number_family_card')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="birth_certificate_registration" class="col-form-label-sm">No. Registrasi Akta Lahir</label>

                            <input type="text" name="birth_certificate_registration" id="birth_certificate_registration" class="form-control form-control-sm @if ($errors->has('birth_certificate_registration')) is-invalid @endif" value="{{$learner->personal->birth_certificate_registration ?? old('birth_certificate_registration')}}" placeholder="Masukan no. registrasi akta lahir disini">

                            @if ($errors->has('birth_certificate_registration'))
                            <div class="invalid-feedback">
                                {{$errors->first('birth_certificate_registration')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="religion" class="col-form-label-sm">Agama</label>

                            <select name="religion" id="religion" class="custom-select custom-select-sm">
                                <option value="islam" {{ (old('religion') ?? !empty($learner->personal->religion)) === 'islam' ? 'selected' : '' }}>Islam</option>
                                <option value="kristen" {{ (old('religion') ?? !empty($learner->personal->religion)) === 'kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="hindu" {{ (old('religion') ?? !empty($learner->personal->religion)) === 'hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="budha" {{ (old('religion') ?? !empty($learner->personal->religion)) === 'budha' ? 'selected' : '' }}>Budha</option>
                            </select>

                            @if ($errors->has('religion'))
                            <div class="invalid-feedback">
                                {{$errors->first('religion')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan & Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
