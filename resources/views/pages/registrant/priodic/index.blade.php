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
                    <li class="breadcrumb-item active"><a href="{{route('registrant.priodic.index')}}">Alamat</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.father.index')}}">Ayah</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.mother.index')}}">Ibu</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.guardian.index')}}">Wali</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Priodik</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    Priodik
                </div>

                <form action="{{route('registrant.priodic.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$learner->id ?? null}}">

                        <div class="form-group">
                            <label for="height" class="col-form-label-sm">Tinggi Badan<span class="text-danger">*</span></label>

                            <input type="number" name="height" id="height" class="form-control form-control-sm @if ($errors->has('height')) is-invalid @endif" value="{{!empty($learner->priodic->height) ? $learner->priodic->height : old('height')}}" placeholder="Masukan tinggi disini">

                            @if ($errors->has('height'))
                            <div class="invalid-feedback">
                                {{$errors->first('height')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="weight" class="col-form-label-sm">Berat Badan<span class="text-danger">*</span></label>

                            <input type="number" name="weight" id="weight" class="form-control form-control-sm @if ($errors->has('weight')) is-invalid @endif" value="{{!empty($learner->priodic->weight) ? $learner->priodic->weight : old('weight')}}" placeholder="Masukan berat disini">

                            @if ($errors->has('weight'))
                            <div class="invalid-feedback">
                                {{$errors->first('weight')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="distance_from_home" class="col-form-label-sm">Jarak tempat tinggal ke sekolah</label>

                            <br>
    
                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="distance_from_home" id="distance_from_home_ya" value="1" @if ($learner->priodic()->exists() && ($learner->priodic->distance_from_home  == 1)) checked @endif>
                                <label class="custom-control-label" for="distance_from_home_ya">Kurang dari 1 km</label>
                            </div>
    
                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="distance_from_home" id="distance_from_home_tidak" value="0" @if ($learner->priodic()->exists() && ($learner->priodic->distance_from_home  == 0)) checked @endif>
                                <label class="custom-control-label" for="distance_from_home_tidak">Lebih dari 1 km</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="kilometer" class="col-form-label-sm">Sebutkan (dalam kilometer)</label>

                            <input type="number" name="kilometer" id="kilometer" class="form-control form-control-sm @if ($errors->has('kilometer')) is-invalid @endif" value="{{$learner->priodic->kilometer ?? old('kilometer')}}" placeholder="Masukan kilometer disini">

                            @if ($errors->has('kilometer'))
                            <div class="invalid-feedback">
                                {{$errors->first('kilometer')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="time" class="col-form-label-sm">Waktu tempuh ke sekolah <span class="text-danger">*01:15</span></label>

                            <input type="text" name="time" id="time" class="form-control form-control-sm @if ($errors->has('time')) is-invalid @endif" value="{{$learner->priodic()->exists() ? Carbon\Carbon::parse($learner->priodic->time)->format('H:i') : old('time')}}" placeholder="Masukan waktu disini">

                            @if ($errors->has('time'))
                            <div class="invalid-feedback">
                                {{$errors->first('time')}}
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
