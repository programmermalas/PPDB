@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.registration.index')}}">Registrasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pribadi</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    Pribadi
                </div>

                <form action="{{route('registrant.personal.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="date" class="col-form-label-sm">Tanggal Pendaftaran <span class="text-danger">*01/01/2001</span></label>

                            <input type="text" name="date" id="date" class="form-control form-control-sm @if ($errors->has('date')) is-invalid @endif" value="{{ !is_null($learner) ? Carbon\Carbon::parse($learner->created_at)->format('d/m/Y') : Carbon\Carbon::now()->format('d/m/Y') }}" placeholder="Masukan tanggal disini">

                            @if ($errors->has('date'))
                            <div class="invalid-feedback">
                                {{$errors->first('date')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nick" class="col-form-label-sm">Nama Panggilan <span class="text-danger">*</span></label>

                            <input type="text" name="nick" id="nick" class="form-control form-control-sm @if ($errors->has('nick')) is-invalid @endif" value="{{$learner->personal->nick ?? old('nick')}}" placeholder="Masukan nama panggilan disini">

                            @if ($errors->has('nick'))
                            <div class="invalid-feedback">
                                {{$errors->first('nick')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin <span class="text-danger">*</span></label>

                            <select name="gender" id="gender" class="custom-select custom-select-sm @if ($errors->has('gender')) is-invalid @endif">
                                <option value="boy" @if (!is_null($learner) && $learner->personal()->exists() && ($learner->personal->gender == 'boy')) selected @endif>Laki-laki</option>
                                <option value="girl" @if (!is_null($learner) && $learner->personal()->exists() && ($learner->personal->gender == 'girl')) selected @endif>Perempuan</option>
                            </select>

                            @if ($errors->has('gender'))
                            <div class="invalid-feedback">
                                {{$errors->first('gender')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="number_of_siblings" class="col-form-label-sm">Jumlah saudara kandung <span class="text-danger">*</span></label>

                            <input type="number" name="number_of_siblings" id="number_of_siblings" class="form-control form-control-sm @if ($errors->has('number_of_siblings')) is-invalid @endif" value="{{$learner->personal->number_of_siblings ?? old('number_of_siblings')}}" placeholder="Masukan jumlah saudara kandung disini" min="0">

                            @if ($errors->has('number_of_siblings'))
                            <div class="invalid-feedback">
                                {{$errors->first('number_of_siblings')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="order_in_family" class="col-form-label-sm">Anak keberapa <span class="text-danger">*</span></label>

                            <input type="number" name="order_in_family" id="order_in_family" class="form-control form-control-sm @if ($errors->has('order_in_family')) is-invalid @endif" value="{{$learner->personal->order_in_family ?? old('order_in_family')}}" placeholder="Masukan anak keberapa disini" min="0">

                            @if ($errors->has('order_in_family'))
                            <div class="invalid-feedback">
                                {{$errors->first('order_in_family')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="number_family_card" class="col-form-label-sm">No. Kartu Keluarga <span class="text-danger">*</span></label>

                            <input type="text" name="number_family_card" id="number_family_card" class="form-control form-control-sm @if ($errors->has('number_family_card')) is-invalid @endif" value="{{$learner->personal->number_family_card ?? old('number_family_card')}}" placeholder="Masukan no. kartu keluarga disini">

                            @if ($errors->has('number_family_card'))
                            <div class="invalid-feedback">
                                {{$errors->first('number_family_card')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="birth_certificate_registration" class="col-form-label-sm">No. Registrasi Akta Lahir <span class="text-danger">*</span></label>

                            <input type="text" name="birth_certificate_registration" id="birth_certificate_registration" class="form-control form-control-sm @if ($errors->has('birth_certificate_registration')) is-invalid @endif" value="{{$learner->personal->birth_certificate_registration ?? old('birth_certificate_registration')}}" placeholder="Masukan no. registrasi akta lahir disini">

                            @if ($errors->has('birth_certificate_registration'))
                            <div class="invalid-feedback">
                                {{$errors->first('birth_certificate_registration')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="religion" class="col-form-label-sm">Agama <span class="text-danger">*</span></label>

                            <select name="religion" id="religion" class="custom-select custom-select-sm @if ($errors->has('religion')) is-invalid @endif">
                                <option value="islam" @if (!is_null($learner) && $learner->personal()->exists() && $learner->personal->religion == 'islam') selected @endif>Islam</option>
                                <option value="kristen" @if (!is_null($learner) && $learner->personal()->exists() && $learner->personal->religion == 'kristen') selected @endif>Kristen</option>
                                <option value="hindu" @if (!is_null($learner) && $learner->personal()->exists() && $learner->personal->religion == 'hindu') selected @endif>Hindu</option>
                                <option value="budha" @if (!is_null($learner) && $learner->personal()->exists() && $learner->personal->religion == 'budha') selected @endif>Budha</option>
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
