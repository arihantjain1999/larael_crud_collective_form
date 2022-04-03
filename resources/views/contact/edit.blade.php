@extends('layouts.app')
@section('content')

<div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Person's Contact Details</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('contact.index') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            {!!Form::model($contact,['route' => ['contact.update' , $contact->id] ,'method'=>'POST'])!!}

                @csrf
                @method('PUT')
                @include('contact.form_c')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Relation with Contacts :</label>
                    <div class="col-sm-5">
                           @php
                               $contacta = DB::table('account_contact')->select('account_id')->where('contact_id',$contact->id)->get();
                                // dd($contacta);
                          @endphp                                    
                            <select class="form-control" name="Account_detach_id">  
                                <option value="null">None</option>
                                @foreach($contacta as $contact) 
                                @php
                                    $contact_name = DB::table('accounts')->select('f_name')->where('id',$contact->account_id)->get();
                                @endphp
                                <option value= " {{ $contact->account_id }} "> {{$contact_name}}</option>
                                @endforeach
                            </select>
                    </div>
                 </div>
                {!!Form::submit('Create Contact' , ['class'=>'btn btn-primary ml-3']);!!}
                {!! Form::close() !!}
        </div>
@endsection