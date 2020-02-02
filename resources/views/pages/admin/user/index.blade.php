@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <a href="{{route('admin.user.create')}}" class="btn btn-primary btn-sm align-self-center">Create</a>
                    </div>
                    <div>
                        <form action="{{route('admin.user.show')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control form-control-sm" placeholder="search" aria-label="search" aria-describedby="button-search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary" type="button" id="button-search">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Number</th>
                                <th>Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            
                            @if ($users->count() > 0)
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{++$no}}</td>
                                <td>{{$user->number}}</td>
                                <td>{{$user->name}}</td>
                                <td class="text-center">
                                    
                                    <form action="{{route('admin.user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('admin.user.print', $user->id)}}" class="btn btn-success btn-sm">Print</a>

                                        <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-info btn-sm">Edit</a>

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">User not yet created!</td>
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
