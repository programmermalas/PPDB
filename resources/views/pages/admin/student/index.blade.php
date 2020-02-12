@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        Calon Peserta Didik
                    </div>
                    <div>
                        <form class="form-inline" action="{{route('admin.student.show')}}" method="post">
                            @csrf

                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control form-control-sm" placeholder="search" aria-label="search" aria-describedby="button-search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary" type="button" id="button-search">Search</button>
                                </div>
                            </div>

                            <a href="{{route('admin.student.export')}}" class="btn btn-sm btn-primary ml-1">Export</a>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th class="text-center">Status Daftar Ulang</th>
                                <th class="text-center">Nominal</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            
                            @if ($registrations->count() > 0)
                            @foreach ($registrations as $registration)
                            <tr>
                                <td class="text-center">{{++$no}}</td>
                                <td>{{$registration->name_of_candidate}}</td>
                                <td class="text-center">
                                    @if ($registration->status == 'unpayment')
                                        <span class="badge badge-danger">Belum Daftar Ulang</span>
                                    @elseif ($registration->status == 'payment')
                                        <span class="badge badge-success">Sudah Daftar Ulang</span>
                                    @endif    
                                </td>
                                <td class="text-center">Rp {{number_format($registration->nominal, 0, ',', '.')}},-</td>
                                <td class="text-center">Rp {{number_format($registration->learner->cost 
                                        ? $registration->learner->cost->total()
                                        : 0 , 0, ',', '.')}},-</td>
                                <td class="text-center">
                                    <a href="{{route('admin.student.print', $registration->id)}}" class="btn btn-success btn-sm">Print</a>

                                    <a href="{{route('admin.student.edit', $registration->id)}}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">Student not yet created!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
