<div class="row mx-5 px-5" id="container">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                         <strong >Project Name</strong>   
                        <div class="col-sm-5">
                                {!! Form::text('p_name',$project->p_name??'' , ['placeholder' => 'project Name' , 'class'=>'form-control']); !!}
                        </div>
                            @error('p_name')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror    

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                            <strong>Company Name:</strong>
                            <!-- <input type="text" name="company" class="form-control" value="{{$project->company??''}}" placeholder="Full Name"  required> -->
                            <div class="col-sm-5">
                                {!! Form::text('company',$project->company??'' , ['placeholder' => 'company' , 'class'=>'form-control']); !!}
                            </div>
                            @error('company')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror    
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Starting date:</strong>
                            <!-- <input type="date" name="s_date" class="form-control" value="{{$project->s_date??''}}" placeholder="Date Of Birth"  required> -->
                            <div class="col-sm-5">
                                {!!Form::date('s_date', $project->s_date??'' , ['class'=>'form-control'] );!!}
                            </div>
                            @error('s_date')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Country:</strong>
                        <div class="col-sm-5">
                            {!! Form::select('country', ['India' => 'India', 'Russia' => 'Russia', 'America' => 'America', 'Poland' => 'Poland'], null, ['class'=>'form-control']); !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Contacts :</label>
                            <div class="col-sm-5">
                                   @php
                                       $contacts = DB::table('contacts')->select('name','id')->get();
                                   @endphp                                    
                                    <select class="form-control" name="Contact_id">
                                        <option value="nnull">None</option>
                                        @foreach($contacts as $contact) 
                                        <option value= " {{ $contact->id }} "> {{$contact->name}} </option>
                                        @endforeach
                                    </select>
                            </div>
                         </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                        <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->
                       
                        {{-- {!!Form::submit('Submit Project' , ['class'=>'btn btn-primary ml-3']);!!} --}}
                    </div>
                </div>