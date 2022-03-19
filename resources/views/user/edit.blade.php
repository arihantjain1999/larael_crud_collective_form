@extends('layouts.app')
@section('content')

<div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit User user Details</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('user.show',$user->id) }}" enctype="multipart/form-data">Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            {!!Form::model($user,['route' => ['user.update' , $user->id] ,'method'=>'POST'])!!}

                @csrf
                @method('PUT')
                @include('user.form')
                {!! Form::close() !!}
        </div>
@endsection