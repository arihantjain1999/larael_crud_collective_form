@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Contacts All Data</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('contact.create') }}"> Create Contact Details</a>
                    </div>
                </div>
            </div>
        
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <table class="table table-bordered shadow table-hover text-center">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Account releted</th>
                        <!-- <th>Address</th> -->
                        <!-- <th>Hobby</th> -->
                        <!-- <th>Gender</th> -->
                        <!-- <th>Country</th> -->
                        <th width="280px">Action</th>
                    </tr>         
                    @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }} </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td> 
                    <td><div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>
                            @foreach ($contact->account as $name)
                                {{$name->f_name}}<br>
                            @endforeach
                        </strong>
                        </div></td>
                    <td>
                        <form action="{{ route('contact.destroy',$contact->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('contact.show',$contact->id) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('contact.edit',$contact->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach</tr>
        
        </table>
@endsection
   