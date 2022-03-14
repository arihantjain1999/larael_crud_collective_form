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
                        <h2>All Data</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('account.create') }}"> Create Person Details</a>
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
                        <th>f_Name</th>
                        <th>l_Name</th>
                        <!-- <th>DOB</th> -->
                        <th>Phone</th>
                        <th>Email</th>
                        <!-- <th>Address</th> -->
                        <!-- <th>Hobby</th> -->
                        <!-- <th>Gender</th> -->
                        <!-- <th>Country</th> -->
                        <th width="280px">Action</th>
                    </tr>         
                    @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->id }}</td>
                    <td>{{ $account->f_name }}</td>
                    <td>{{ $account->l_name }}</td>
                    <!-- <td>{{ $account->dob }}</td> -->
                    <td>{{ $account->phone }}</td>
                    <td>{{ $account->email }}</td>
                    <!-- <td>{{ $account->address }}</td> -->
                    <!-- <td>{{ $account->hobby }}</td> -->
                    <!-- <td>{{ $account->gender }}</td> -->
                    <!-- <td>{{ $account->country }}</td> -->
                    <td>
                        <form action="{{ route('account.destroy',$account->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('account.show',$account->id) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('account.edit',$account->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach</tr>
        
        </table>
@endsection
   