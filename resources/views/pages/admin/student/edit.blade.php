@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <div class="card">
                <div class="card-header">User Edit</div>

                <form action="{{route('admin.student.update', $registration->id)}}" method="post">
                    <div class="card-body">
                        @csrf

                        <div class="form-group">
                            <label for="name_of_candidate" class="col-form-label-sm">Name</label>

                            <input type="text" name="name_of_candidate" id="name_of_candidate" class="form-control form-control-sm @if ($errors->has('name_of_candidate')) is-invalid @endif" value="{{old('name_of_candidate') ?: $registration->name_of_candidate}}">

                            @if ($errors->has('name_of_candidate'))
                            <div class="invalid-feedback">
                                {{$errors->first('name_of_candidate')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nominal" class="col-form-label-sm">Nominal</label>

                            <input type="number" name="nominal" id="nominal" class="form-control form-control-sm @if ($errors->has('nominal')) is-invalid @endif" value="{{old('nominal') ?: $registration->nominal}}">

                            @if ($errors->has('nominal'))
                            <div class="invalid-feedback">
                                {{$errors->first('nominal')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status Pembayaran</label>

                            <select name="status" id="status" class="custom-select custom-select-sm">
                                <option value="unpayment">Belum Dibayar</option>
                                <option value="payment">Sudah Dibayar</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
