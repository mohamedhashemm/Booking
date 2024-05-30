@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <h5 class="card-title mb-4 d-inline">Admins</h5>
                        <a href="{{ route('admins.create') }}" class="btn btn-primary mb-4 text-center float-right">Create
                            Admins</a>
                        <div class="table-responsive">
                            <table class="table table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">EMAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <th scope="row">{{ $admin->id }}</th>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
