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
                    <li class="breadcrumb-item active" aria-current="page">Alamat</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    Alamat
                </div>

                <form action="{{route('registrant.address.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$learner->id ?? null}}">

                        <div class="form-group">
                            <label for="street" class="col-form-label-sm">Alamat Jalan <span class="text-danger">*</span></label>

                            <input type="text" name="street" id="street" class="form-control form-control-sm @if ($errors->has('street')) is-invalid @endif" value="{{$learner->address->street ?? old('street')}}" placeholder="Masukan alamat jalan disini">

                            @if ($errors->has('street'))
                            <div class="invalid-feedback">
                                {{$errors->first('street')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="neighborhood_association" class="col-form-label-sm">RT <span class="text-danger">*</span></label>

                            <input type="text" name="neighborhood_association" id="neighborhood_association" class="form-control form-control-sm @if ($errors->has('neighborhood_association')) is-invalid @endif" value="{{$learner->address->neighborhood_association ?? old('neighborhood_association')}}" placeholder="Masukan rt disini">

                            @if ($errors->has('neighborhood_association'))
                            <div class="invalid-feedback">
                                {{$errors->first('neighborhood_association')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="citizens_association" class="col-form-label-sm">RW <span class="text-danger">*</span></label>

                            <input type="text" name="citizens_association" id="citizens_association" class="form-control form-control-sm @if ($errors->has('citizens_association')) is-invalid @endif" value="{{$learner->address->citizens_association ?? old('citizens_association')}}" placeholder="Masukan rw disini">

                            @if ($errors->has('citizens_association'))
                            <div class="invalid-feedback">
                                {{$errors->first('citizens_association')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="village" class="col-form-label-sm">Nama Dusun <span class="text-danger">*</span></label>

                            <input type="text" name="village" id="village" class="form-control form-control-sm @if ($errors->has('village')) is-invalid @endif" value="{{$learner->address->village ?? old('village')}}" placeholder="Masukan nama dusun disini">

                            @if ($errors->has('village'))
                            <div class="invalid-feedback">
                                {{$errors->first('village')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="sub_district" class="col-form-label-sm">Nama Kelurahan/Desa <span class="text-danger">*</span></label>

                            <input type="text" name="sub_district" id="sub_district" class="form-control form-control-sm @if ($errors->has('sub_district')) is-invalid @endif" value="{{$learner->address->sub_district ?? old('sub_district')}}" placeholder="Masukan nama kelurahan/desa disini">

                            @if ($errors->has('sub_district'))
                            <div class="invalid-feedback">
                                {{$errors->first('sub_district')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="postal_code" class="col-form-label-sm">Kode Pos <span class="text-danger">*</span></label>

                            <input type="text" name="postal_code" id="postal_code" class="form-control form-control-sm @if ($errors->has('postal_code')) is-invalid @endif" value="{{$learner->address->postal_code ?? old('postal_code')}}" placeholder="Masukan kode pos disini">

                            @if ($errors->has('postal_code'))
                            <div class="invalid-feedback">
                                {{$errors->first('postal_code')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="residence">Tempat Tinggal <span class="text-danger">*</span></label>

                            <select name="residence" id="residence" class="custom-select custom-select-sm @if ($errors->has('residence')) is-invalid @endif">
                                <option value="parents" @if ($learner->address()->exists() && $learner->address->residence == 'parents') selected @endif>Orang tua</option>
                                <option value="guardian" @if ($learner->address()->exists() && $learner->address->residence == 'guardian') selected @endif>Wali</option>
                                <option value="boarding_house" @if ($learner->address()->exists() && $learner->address->residence == 'boarding_house') selected @endif>Kos</option>
                                <option value="dormitory" @if ($learner->address()->exists() && $learner->address->residence == 'dormitory') selected @endif>Asrama</option>
                                <option value="orphanage" @if ($learner->address()->exists() && $learner->address->residence == 'orphanage') selected @endif>Panti Asuhan</option>
                                <option value="other" @if ($learner->address()->exists() && $learner->address->residence == 'other') selected @endif>Lainnya</option>
                            </select>

                            @if ($errors->has('residence'))
                            <div class="invalid-feedback">
                                {{$errors->first('residence')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="transportation">Moda Transportasi <span class="text-danger">*</span></label>

                            <select name="transportation" id="transportation" class="custom-select custom-select-sm @if ($errors->has('transportation')) is-invalid @endif">
                                <option value="foot" @if ($learner->address()->exists() && $learner->address->residence == 'foot') selected @endif>Jalan kaki</option>
                                <option value="private_transportation" @if ($learner->address()->exists() && $learner->address->residence == 'private_transportation') selected @endif>Kendaraan pribadi</option>
                                <option value="public_transportation" @if ($learner->address()->exists() && $learner->address->residence == 'public_transportation') selected @endif>Kendaraan umum</option>
                                <option value="school_transportation" @if ($learner->address()->exists() && $learner->address->residence == 'school_transportation') selected @endif>Kendaraan Sekolah</option>
                                <option value="train" @if ($learner->address()->exists() && $learner->address->residence == 'train') selected @endif>Kereta</option>
                                <option value="taxibike" @if ($learner->address()->exists() && $learner->address->residence == 'taxibike') selected @endif>Ojek</option>
                                <option value="horse" @if ($learner->address()->exists() && $learner->address->residence == 'horse') selected @endif>Kuda</option>
                                <option value="boat" @if ($learner->address()->exists() && $learner->address->residence == 'boat') selected @endif>Perahu</option>
                                <option value="other" @if ($learner->address()->exists() && $learner->address->residence == 'other') selected @endif>Lainnya</option>
                            </select>

                            @if ($errors->has('transportation'))
                            <div class="invalid-feedback">
                                {{$errors->first('transportation')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="number_prosperous_family_card" class="col-form-label-sm">No. KKS (Kartu Keluarga Sejahtera)</label>

                            <input type="text" name="number_prosperous_family_card" id="number_prosperous_family_card" class="form-control form-control-sm @if ($errors->has('number_prosperous_family_card')) is-invalid @endif" value="{{$learner->address->number_prosperous_family_card ?? old('number_prosperous_family_card')}}" placeholder="Masukan no. kks disini">

                            @if ($errors->has('number_prosperous_family_card'))
                            <div class="invalid-feedback">
                                {{$errors->first('number_prosperous_family_card')}}
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
