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
                    <li class="breadcrumb-item active"><a href="{{route('registrant.personal.index')}}">Pribadi</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.address.index')}}">Alamat</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.detail.index')}}">Detail</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.father.index')}}">Ayah</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ibu</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    Ibu
                </div>

                <form action="{{route('registrant.mother.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$learner->id ?? null}}">

                        <div class="form-group">
                            <label for="name" class="col-form-label-sm">Nama Ibu Kandung <span class="text-danger">*</span></label>

                            <input type="text" name="name" id="name" class="form-control form-control-sm @if ($errors->has('name')) is-invalid @endif" value="{{$learner->mother->name ?? old('name')}}" placeholder="Masukan nama ibu kandung disini">

                            @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nik" class="col-form-label-sm">NIK Ibu <span class="text-danger">*</span></label>

                            <input type="text" name="nik" id="nik" class="form-control form-control-sm @if ($errors->has('nik')) is-invalid @endif" value="{{$learner->mother->nik ?? old('nik')}}" placeholder="Masukan nik ibu disini">

                            @if ($errors->has('nik'))
                            <div class="invalid-feedback">
                                {{$errors->first('nik')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="year_of_birth" class="col-form-label-sm">Tahun Lahir</label>

                            <input type="text" name="year_of_birth" id="year_of_birth" class="form-control form-control-sm @if ($errors->has('year_of_birth')) is-invalid @endif" value="{{!empty($learner->mother->year_of_birth) ? Carbon\Carbon::parse($learner->mother->year_of_birth)->format('Y') : old('year_of_birth')}}" placeholder="Masukan tahun lahir disini">

                            @if ($errors->has('year_of_birth'))
                            <div class="invalid-feedback">
                                {{$errors->first('year_of_birth')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="last_study" class="col-form-label-sm">Pendidikan Terakhir</label>

                            <input type="text" name="last_study" id="last_study" class="form-control form-control-sm @if ($errors->has('last_study')) is-invalid @endif" value="{{$learner->mother->last_study ?? old('last_study')}}" placeholder="Masukan pendidikan terakhir disini">

                            @if ($errors->has('last_study'))
                            <div class="invalid-feedback">
                                {{$errors->first('last_study')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="profession" class="col-form-label-sm">Pekerjaan</label>

                            <input type="text" name="profession" id="profession" class="form-control form-control-sm @if ($errors->has('profession')) is-invalid @endif" value="{{$learner->mother->profession ?? old('profession')}}" placeholder="Masukan pekerjaan disini">

                            @if ($errors->has('profession'))
                            <div class="invalid-feedback">
                                {{$errors->first('profession')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="income" class="col-form-label-sm">Penghasilan Bulanan</label>

                            <input type="text" name="income" id="income" class="form-control form-control-sm @if ($errors->has('income')) is-invalid @endif" value="{{$learner->mother->income ?? old('income')}}" placeholder="Masukan penghasilan bulanan disini">

                            @if ($errors->has('income'))
                            <div class="invalid-feedback">
                                {{$errors->first('income')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-form-label-sm">No. Telp/HP</label>

                            <input type="text" name="phone" id="phone" class="form-control form-control-sm @if ($errors->has('phone')) is-invalid @endif" value="{{$learner->mother->phone ?? old('phone')}}" placeholder="Masukan no. telp/hp disini">

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
