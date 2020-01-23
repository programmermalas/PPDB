@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <div class="card">
                <div class="card-header">Dashboard</div>

                @role('admin')
                <div class="card-body">
                    You are logged in!
                </div>
                @endrole

                @role('registrant')
                @if(Auth::user()->registration)
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Name</th>
                                <th>Parents</th>
                                <th>Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>{{Auth::user()->registration->name_of_candidate}}</td>
                                <td>{{Auth::user()->registration->parents_name}}</td>
                                <td>{{Auth::user()->registration->address}}</td>
                                <td class="text-center">
                                    <a href="{{route('registrant.registration.index')}}" class="btn btn-sm btn-info">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @else
                <div class="card-body">
                    Kamu berhasil gabung! Silahkan klik lanjutkan untuk ke dalam pendaftaran.
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('registrant.registration.index')}}" class="btn btn-sm btn-primary">Lanjutkan</a>
                    </div>
                </div>
                @endif
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
