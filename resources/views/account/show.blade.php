@extends('layouts.app')
@section('content')
<div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Person's Details</h2>
                    </div>
                    <div class="pull-right">
                        <!-- <a class="btn btn-primary" href="{{ route('account.index') }}" enctype="multipart/form-data">Show all records</a> -->
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('account.update',$account->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Full Name: {{$account->f_name}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name: {{$account->l_name}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Dob: {{$account->dob}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender:
                                {{$account->gender}}
                                <!-- @if($account->gender=='Female') Female @endif -->
                            </strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Phone No.: {{$account->phone}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email: {{$account->email}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Address: {{$account->address}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Hobby:
                                {{$account->hobby}}
                                <!-- @if($account->hobby=='art') Art @endif -->
                            </strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Country: {{$account->country}}</strong>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('account.destroy',$account->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('account.index') }}">Back</a>
                            <a class="btn btn-warning" href="{{ route('account.edit',$account->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
             </form>
                  
        </div>
@endsection