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
                        <input type="hidden" name="id" value="{{$registration->id ?? null}}">

                        <div class="form-group">
                            <label for="number_of_siblings" class="col-form-label-sm">Anak Keberapa</label>

                            <input type="text" name="number_of_siblings" id="number_of_siblings" class="form-control form-control-sm @if ($errors->has('number_of_siblings')) is-invalid @endif" value="{{$registration->number_of_siblings ?? old('number_of_siblings')}}" placeholder="Masukan anak keberapa disini">

                            @if ($errors->has('number_of_siblings'))
                            <div class="invalid-feedback">
                                {{$errors->first('number_of_siblings')}}
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
