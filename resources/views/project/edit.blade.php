@extends('layouts.app')
@section('content')

<div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Project Details</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('project.index') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <!-- <form action="{{ route('project.update',$project->id) }}" method="POST" enctype="multipart/form-data"> -->
            {!!Form::model($project,['route' => ['project.update' , $project->id] ,'method'=>'POST'])!!}

                @csrf
                @method('PUT')
                @include('project.form_c')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Relation with Contacts :</label>
                    <div class="col-sm-5">
                           @php
                               $contacta = DB::table('contact_project')->select('contact_id')->where('project_id',$project->id)->get();
                                // dd($contacta);
                          @endphp                                    
                            <select class="form-control" name="Account_detach_id">  
                                <option value="null">None</option>
                                @foreach($contacta as $contact) 
                                @php
                                    $contact_name = DB::table('contacts')->select('name')->where('id',$contact->contact_id)->get();
                                @endphp
                                <option value= " {{ $contact->contact_id }} "> {{$contact_name}}</option>
                                @endforeach
                            </select>
                    </div>
                 </div>
                {!!Form::submit('Submit Project' , ['class'=>'btn btn-primary ml-3']);!!}

                {!! Form::close() !!}
            <!-- </form> -->
        </div>
@endsection