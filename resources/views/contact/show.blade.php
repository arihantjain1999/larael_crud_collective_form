@extends('layouts.app')
@section('content')
<div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{$contact->name}} Contact Details</h2>
                    </div>
                    <div class="pull-right">
                        <!-- <a class="btn btn-primary" href="{{ route('contact.index') }}" enctype="multipart/form-data">Show all records</a> -->
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('contact.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Full Name: {{$contact->name}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name: {{$contact->phone}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Dob: {{$contact->email}}</strong>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('contact.destroy',$contact->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('contact.index') }}">Back</a>
                            <a class="btn btn-warning" href="{{ route('contact.edit',$contact->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
             </form>
                  
        </div>
@endsection