@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All User Data</h2>
                    </div>
                    <div class="pull-right mb-2">
                        {{-- <a class="btn btn-success" href="{{ route('') }}"> Create Person Details</a> --}}
                    </div>
                </div>
            </div>
        
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <table class="table table-bordered shadow text-center table-striped">
                    <tr>
                        <th>S.No</th>
                        <th>user name</th>
                        <th>Email</th>
                        {{-- <th>Starting date</th> --}}
                        {{-- <th>Country</th> --}}
                        <!-- <th>Address</th> -->
                        <!-- <th>Hobby</th> -->
                        <!-- <th>Gender</th> -->
                        <!-- <th>Country</th> -->
                        <th width="280px">Action</th>
                    </tr>         
                    @foreach ($user as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    {{-- <td>{{ $user->company }}</td> --}}
                    {{-- <td>{{ $user->s_date }}</td>  --}}
                    {{-- <td>{{ $user->country }}</td> --}}
                    <td>
                        <form action="{{ route('user.destroy',$user->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('user.show',$user->id)}}">Show</a>
                            <a class="btn btn-warning" href="{{ route('user.edit',$user->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach</tr>
        
        </table>
@endsection
   