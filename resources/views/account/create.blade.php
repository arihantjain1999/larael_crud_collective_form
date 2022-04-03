@extends('layouts.app')
@section('content')
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add Account Details</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('account.index') }}">Show all Account Records</a>
                    </div>
                </div>
            </div>
        
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <!-- <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data"> -->
                {!!Form::open(['route' => 'account.store'] , ['method'=>'POST' , 'enctype'=>'multipart/form-data'])!!}
                @csrf
                @include('account.form_c')
                <div class="form-group d-none">
                    <label for="exampleFormControlSelect1">Relation with Contacts :</label>
                    <div class="col-sm-5">
                            <select class="form-control" name="Account_detach_id">  
                                <option value="null">None</option>
                            </select>
                    </div>
                 </div>
                {!!Form::submit('Create Account' , ['class'=>'btn btn-primary ml-3']);!!}

                {!! Form::close() !!}
            <!-- </form> -->
            
@endsection