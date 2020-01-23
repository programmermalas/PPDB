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
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    Detail
                </div>

                <form action="{{route('registrant.detail.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$learner->id ?? null}}">

                        <div class="form-group">
                            <label for="number_of_siblings" class="col-form-label-sm">Anak Keberapa <span class="text-danger">*</span></label>

                            <input type="number" name="number_of_siblings" id="number_of_siblings" class="form-control form-control-sm @if ($errors->has('number_of_siblings')) is-invalid @endif" value="{{$learner->detail->number_of_siblings ?? old('number_of_siblings')}}" placeholder="Masukan anak keberapa disini">

                            @if ($errors->has('number_of_siblings'))
                            <div class="invalid-feedback">
                                {{$errors->first('number_of_siblings')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="kps_pkh" class="col-form-label-sm">Penerima KPS/PKH <span class="text-danger">*</span></label>

                            <br>

                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="kps_pkh" id="kps_pkh_ya" value="1" @if ($learner->detail()->exists() && $learner->detail->kps_pkh == 1) checked @endif>
                                <label class="custom-control-label" for="kps_pkh_ya">Ya</label>
                            </div>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="kps_pkh" id="kps_pkh_tidak" value="0" @if ($learner->detail()->exists() && $learner->detail->kps_pkh == 0) checked @endif>
                                <label class="custom-control-label" for="kps_pkh_tidak">Tidak</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_kps_pkh" class="col-form-label-sm">No. KPS/PKH</label>

                            <input type="text" name="no_kps_pkh" id="no_kps_pkh" class="form-control form-control-sm @if ($errors->has('no_kps_pkh')) is-invalid @endif" value="{{$learner->detail->no_kps_pkh ?? old('no_kps_pkh')}}" placeholder="Masukan no. kps/pkh disini">

                            @if ($errors->has('no_kps_pkh'))
                            <div class="invalid-feedback">
                                {{$errors->first('no_kps_pkh')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="invited_from_school" class="col-form-label-sm">Usulan Dari Sekolah <span class="text-danger">*</span></label>

                            <br>

                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="invited_from_school" id="invited_from_school_ya" value="1" @if ($learner->detail()->exists() && ($learner->detail->invited_from_school == 1)) checked @endif>
                                <label class="custom-control-label" for="invited_from_school_ya">Ya</label>
                                @if ($errors->has('invited_from_school'))
                                <div class="invalid-feedback">
                                    {{$errors->first('invited_from_school')}}
                                </div>
                                @endif
                            </div>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="invited_from_school" id="invited_from_school_tidak" value="0" @if ($learner->detail()->exists() && ($learner->detail->invited_from_school == 0)) checked @endif>
                                <label class="custom-control-label" for="invited_from_school_tidak">Tidak</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="kip" class="col-form-label-sm">Penerima KIP <span class="text-danger">*</span></label>

                            <br>

                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="kip" id="kip_ya" value="1" @if ($learner->detail()->exists() && $learner->detail->kip == 1) checked @endif>
                                <label class="custom-control-label" for="kip_ya">Ya</label>
                                @if ($errors->has('kip'))
                                <div class="invalid-feedback">
                                    {{$errors->first('kip')}}
                                </div>
                                @endif
                            </div>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="kip" id="kip_tidak" value="0" @if ($learner->detail()->exists() && $learner->detail->kip == 0) checked @endif>
                                <label class="custom-control-label" for="kip_tidak">Tidak</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="no_kip" class="col-form-label-sm">No. KIP</label>

                            <input type="text" name="no_kip" id="no_kip" class="form-control form-control-sm @if ($errors->has('no_kip')) is-invalid @endif" value="{{$learner->detail->no_kip ?? old('no_kip')}}" placeholder="Masukan no. kip disini">

                            @if ($errors->has('no_kip'))
                            <div class="invalid-feedback">
                                {{$errors->first('no_kip')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name_of_kip" class="col-form-label-sm">Nama tertera di KIP</label>

                            <input type="text" name="name_of_kip" id="name_of_kip" class="form-control form-control-sm @if ($errors->has('name_of_kip')) is-invalid @endif" value="{{$learner->detail->name_of_kip ?? old('name_of_kip')}}" placeholder="Masukan nama tertera di kip disini">

                            @if ($errors->has('name_of_kip'))
                            <div class="invalid-feedback">
                                {{$errors->first('name_of_kip')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="physical_kip_card" class="col-form-label-sm">Terima fisik Kartu KIP</label>

                            <br>

                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="physical_kip_card" id="physical_kip_card_ya" value="1" @if ($learner->detail()->exists() && ($learner->detail->physical_kip_card  == 1)) checked @endif>
                                <label class="custom-control-label" for="physical_kip_card_ya">Ya</label>
                                @if ($errors->has('physical_kip_card'))
                                <div class="invalid-feedback">
                                    {{$errors->first('physical_kip_card')}}
                                </div>
                                @endif
                            </div>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input class="custom-control-input" type="radio" name="physical_kip_card" id="physical_kip_card_tidak" value="0" @if ($learner->detail()->exists() && ($learner->detail->physical_kip_card  == 0)) checked @endif>
                                <label class="custom-control-label" for="physical_kip_card_tidak">Tidak</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="reason">Alasan layak PIP <span class="text-danger">*</span></label>

                            <select name="reason" id="reason" class="custom-select custom-select-sm">
                                <option value="">- Pilih -</option>
                                <option value="pkh_kps_kip" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'pkh_kps_kip' ? 'selected' : '' }}>Pemegang PKH/KPS/KIP</option>
                                <option value="bsm" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'bsm' ? 'selected' : '' }}>Penerima BSM 2014</option>
                                <option value="orphanage" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'orphanage' ? 'selected' : '' }}>Yatim Piatu/Panti Asuhan/Panti Sosial</option>
                                <option value="dampal" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'dampal' ? 'selected' : '' }}>Dampal</option>
                                <option value="drop_out" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'drop_out' ? 'selected' : '' }}>Pernah Drop Out</option>
                                <option value="poor" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'poor' ? 'selected' : '' }}>Siswa Miskin/Rentan Miskin</option>
                                <option value="conflict" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'conflict' ? 'selected' : '' }}>Daerah Konflik</option>
                                <option value="convicted" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'convicted' ? 'selected' : '' }}>Keluarga Terpidana</option>
                                <option value="other" {{ (old('reason') ?? ($learner->detail()->exists() ? $learner->detail->reason : null)) == 'other' ? 'selected' : '' }}>Lainnya</option>
                            </select>

                            @if ($errors->has('reason'))
                            <div class="invalid-feedback">
                                {{$errors->first('reason')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="bank" class="col-form-label-sm">Bank</label>

                            <input type="text" name="bank" id="bank" class="form-control form-control-sm @if ($errors->has('bank')) is-invalid @endif" value="{{$learner->detail->bank ?? old('bank')}}" placeholder="Masukan bank disini">

                            @if ($errors->has('bank'))
                            <div class="invalid-feedback">
                                {{$errors->first('bank')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="account_number" class="col-form-label-sm">No. Rekening Bank</label>

                            <input type="text" name="account_number" id="account_number" class="form-control form-control-sm @if ($errors->has('account_number')) is-invalid @endif" value="{{$learner->detail->account_number ?? old('account_number')}}" placeholder="Masukan no. rekening bank disini">

                            @if ($errors->has('account_number'))
                            <div class="invalid-feedback">
                                {{$errors->first('account_number')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="account_name" class="col-form-label-sm">Rekening atas nama</label>

                            <input type="text" name="account_name" id="account_name" class="form-control form-control-sm @if ($errors->has('account_name')) is-invalid @endif" value="{{$learner->detail->account_name ?? old('account_name')}}" placeholder="Masukan rekening atas nama disini">

                            @if ($errors->has('account_name'))
                            <div class="invalid-feedback">
                                {{$errors->first('account_name')}}
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
