@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
                    <li class="breadcrumb-item active"><a href="#">Pribadi</a></li>
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
                    Registration
                </div>

                <form action="{{route('registrant.registration.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$registration->id ?? null}}">

                        <div class="form-group">
                            <label for="name_of_candidate" class="col-form-label-sm">Nama calon peserta didik</label>

                            <input type="text" name="name_of_candidate" id="name_of_candidate" class="form-control form-control-sm @if ($errors->has('name_of_candidate')) is-invalid @endif" value="{{$registration->name_of_candidate ?? old('name_of_candidate')}}" placeholder="Masukan nama calon peserta disini">

                            @if ($errors->has('name_of_candidate'))
                            <div class="invalid-feedback">
                                {{$errors->first('name_of_candidate')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="place_of_birth" class="col-form-label-sm">Tempat lahir</label>

                            <input type="text" name="place_of_birth" id="place_of_birth" class="form-control form-control-sm @if ($errors->has('place_of_birth')) is-invalid @endif" value="{{$registration->place_of_birth ?? old('place_of_birth')}}" placeholder="Masukan tempat lahir disini">

                            @if ($errors->has('place_of_birth'))
                            <div class="invalid-feedback">
                                {{$errors->first('place_of_birth')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth" class="col-form-label-sm">Tanggal lahir <span class="text-danger">*01/01/2001</span></label>

                            <input type="text" name="date_of_birth" id="date_of_birth" class="form-control form-control-sm @if ($errors->has('date_of_birth')) is-invalid @endif" value="{{!empty($registration->date_of_birth) ?  Carbon\Carbon::parse($registration->date_of_birth)->format('d/m/Y') : old('date_of_birth')}}" placeholder="Masukan tnggal lahir disini">

                            @if ($errors->has('date_of_birth'))
                            <div class="invalid-feedback">
                                {{$errors->first('date_of_birth')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="school_origin" class="col-form-label-sm">Asal Sekolah</label>

                            <input type="text" name="school_origin" id="school_origin" class="form-control form-control-sm @if ($errors->has('school_origin')) is-invalid @endif" value="{{$registration->school_origin ?? old('school_origin')}}" placeholder="Masukan asal sekolah disini">

                            @if ($errors->has('school_origin'))
                            <div class="invalid-feedback">
                                {{$errors->first('school_origin')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="parents_name" class="col-form-label-sm">Nama orang tua</label>

                            <input type="text" name="parents_name" id="parents_name" class="form-control form-control-sm @if ($errors->has('parents_name')) is-invalid @endif" value="{{$registration->parents_name ?? old('parents_name')}}" placeholder="Masukan nama orang tua disini">

                            @if ($errors->has('parents_name'))
                            <div class="invalid-feedback">
                                {{$errors->first('parents_name')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-form-label-sm">Alamat</label>

                            <textarea name="address" id="address" class="form-control form-control-sm @if ($errors->has('address')) is-invalid @endif" placeholder="Masukan alamat disini" style="resize: none;">{{$registration->address ?? old('address')}}</textarea>

                            @if ($errors->has('address'))
                            <div class="invalid-feedback">
                                {{$errors->first('address')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-form-label-sm">No. Telephone/Handphone</label>

                            <input type="text" name="phone" id="phone" class="form-control form-control-sm @if ($errors->has('phone')) is-invalid @endif" value="{{$registration->phone ?? old('phone')}}" placeholder="Masukan no. telephone/handphone disini">

                            @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
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
