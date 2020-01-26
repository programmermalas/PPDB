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
                    <li class="breadcrumb-item active"><a href="{{route('registrant.father.index')}}">Ayah</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.mother.index')}}">Ibu</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.guardian.index')}}">Wali</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('registrant.priodic.index')}}">Priodik</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rincian Biaya</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    Rincian Biaya
                </div>

                <form action="{{route('registrant.cost.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$learner->id ?? null}}">

                        <div class="form-group">
                            <label for="institutional_development_contributions" class="col-form-label-sm">Sumbangan pengembangan institusi, sebesar: </label>

                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="institutional_development_contributions" id="institutional_development_constributions_a" value="3500000" @if ($learner->cost()->exists() && $learner->cost->institutional_development_contributions  == 3500000) checked @endif>
                                        <label class="custom-control-label" for="institutional_development_constributions_a">a. Rp 3.500.000,-</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="institutional_development_contributions" id="institutional_development_constributions_b" value="3700000" @if ($learner->cost()->exists() && $learner->cost->institutional_development_contributions  == 3700000) checked @endif>
                                        <label class="custom-control-label" for="institutional_development_constributions_b">b. Rp 3.700.000,-</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="institutional_development_contributions" id="institutional_development_constributions_c" value="3900000" @if ($learner->cost()->exists() && $learner->cost->institutional_development_contributions  == 3900000) checked @endif>
                                        <label class="custom-control-label" for="institutional_development_constributions_c">c. Rp 3.900.000,-</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="institutional_development_contributions" id="institutional_development_constributions_d" value="4000000" @if ($learner->cost()->exists() && $learner->cost->institutional_development_contributions  == 4000000) checked @endif>
                                        <label class="custom-control-label" for="institutional_development_constributions_d">d. Rp 4.000.000,-</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="donation" class="col-form-label-sm">Sumbangan wakaf, sebesar: </label>

                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="donation" id="donation_a" value="1150000" @if ($learner->cost()->exists() && $learner->cost->donation  == 1150000) checked @endif>
                                        <label class="custom-control-label" for="donation_a">a. Rp 1.150.000,-</label>
                                        @if ($errors->has('donation'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('donation')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="donation" id="donation_b" value="1250000" @if ($learner->cost()->exists() && $learner->cost->donation  == 1250000) checked @endif>
                                        <label class="custom-control-label" for="donation_b">b. Rp 1.250.000,-</label>
                                        @if ($errors->has('donation'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('donation')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="donation" id="donation_c" value="1350000" @if ($learner->cost()->exists() && $learner->cost->donation  == 1350000) checked @endif>
                                        <label class="custom-control-label" for="donation_c">c. Rp 1.350.000,-</label>
                                        @if ($errors->has('donation'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('donation')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="donation" id="donation_d" value="1500000" @if ($learner->cost()->exists() && $learner->cost->donation  == 1500000) checked @endif>
                                        <label class="custom-control-label" for="donation_d">d. Rp 1.500.000,-</label>
                                        @if ($errors->has('donation'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('donation')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="facilities_and_infrastructure" class="col-form-label-sm">Sarana dan prasarana perbulan selama dua tahun pertama, sebesar: </label>

                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="facilities_and_infrastructure" id="facilities_and_infrastructure_a" value="130000" @if ($learner->cost()->exists() && $learner->cost->facilities_and_infrastructure  == 130000) checked @endif>
                                        <label class="custom-control-label" for="facilities_and_infrastructure_a">Rp 130.000,-</label>
                                        @if ($errors->has('facilities_and_infrastructure'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('facilities_and_infrastructure')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="facilities_and_infrastructure" id="facilities_and_infrastructure_b" value="140000" @if ($learner->cost()->exists() && $learner->cost->facilities_and_infrastructure  == 140000) checked @endif>
                                        <label class="custom-control-label" for="facilities_and_infrastructure_b">Rp 140.000,-</label>
                                        @if ($errors->has('facilities_and_infrastructure'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('facilities_and_infrastructure')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="facilities_and_infrastructure" id="facilities_and_infrastructure_c" value="150000" @if ($learner->cost()->exists() && $learner->cost->facilities_and_infrastructure  == 150000) checked @endif>
                                        <label class="custom-control-label" for="facilities_and_infrastructure_c">Rp 150.000,-</label>
                                        @if ($errors->has('facilities_and_infrastructure'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('facilities_and_infrastructure')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="facilities_and_infrastructure" id="facilities_and_infrastructure_d" value="160000" @if ($learner->cost()->exists() && $learner->cost->facilities_and_infrastructure  == 160000) checked @endif>
                                        <label class="custom-control-label" for="facilities_and_infrastructure_d">Rp 160.000,-</label>
                                        @if ($errors->has('facilities_and_infrastructure'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('facilities_and_infrastructure')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="educational_assistance_donors" class="col-form-label-sm">Syariyah/SPP perbulan sebesar: </label>

                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="educational_assistance_donors" id="educational_assistance_donors_a" value="220000" @if ($learner->cost()->exists() && $learner->cost->educational_assistance_donors  == 220000) checked @endif>
                                        <label class="custom-control-label" for="educational_assistance_donors_a">a. Rp 220.000,-</label>
                                        @if ($errors->has('educational_assistance_donors'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('educational_assistance_donors')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="educational_assistance_donors" id="educational_assistance_donors_b" value="230000" @if ($learner->cost()->exists() && $learner->cost->educational_assistance_donors  == 230000) checked @endif>
                                        <label class="custom-control-label" for="educational_assistance_donors_b">b. Rp 230.000,-</label>
                                        @if ($errors->has('educational_assistance_donors'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('educational_assistance_donors')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="educational_assistance_donors" id="educational_assistance_donors_c" value="240000" @if ($learner->cost()->exists() && $learner->cost->educational_assistance_donors  == 240000) checked @endif>
                                        <label class="custom-control-label" for="educational_assistance_donors_c">c. Rp 240.000,-</label>
                                        @if ($errors->has('educational_assistance_donors'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('educational_assistance_donors')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="educational_assistance_donors" id="educational_assistance_donors_d" value="250000" @if ($learner->cost()->exists() && $learner->cost->educational_assistance_donors  == 250000) checked @endif>
                                        <label class="custom-control-label" for="educational_assistance_donors_d">d. Rp 250.000,-</label>
                                        @if ($errors->has('educational_assistance_donors'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('educational_assistance_donors')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="infaq" class="col-form-label-sm">Infaq <span class="text-danger">*</span></label>

                            <input type="number" name="infaq" id="infaq" class="form-control form-control-sm @if ($errors->has('infaq')) is-invalid @endif" value="{{!empty($learner->cost->infaq) ?? old('infaq')}}" placeholder="Masukan infaq disini">

                            @if ($errors->has('infaq'))
                            <div class="invalid-feedback">
                                {{$errors->first('infaq')}}
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
