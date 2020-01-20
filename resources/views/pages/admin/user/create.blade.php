@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <div class="card">
                <div class="card-header">User Create</div>

                <form action="{{route('admin.user.store')}}" method="post">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label-sm">Name</label>

                            <input type="text" name="name" id="name" class="form-control form-control-sm @if ($errors->has('name')) is-invalid @endif" value="{{old('name')}}" placeholder="Insert name here">

                            @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label-sm">Password</label>
                            
                            <input type="password" name="password" id="password" class="form-control form-control-sm @if ($errors->has('password')) is-invalid @endif" value="{{old('password')}}" placeholder="Insert password">

                            @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{$errors->first('password')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-form-label-sm">Password Confirmation</label>
                            
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm @if ($errors->has('password_confirmation')) is-invalid @endif" value="{{old('password_confirmation')}}" placeholder="Insert password confirmation">

                            @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{$errors->first('password_confirmation')}}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>

                            <select name="role" id="role" class="custom-select custom-select-sm">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role') === $role->id ? 'selected' : '' }}> {{ $role->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
