<div class="row mx-5 px-5" id="container">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                         <strong >First Name</strong>   
                        <div class="col-sm-5">
                                {!! Form::text('name', $contact->name??'' , ['placeholder' => ' Name' , 'class'=>'form-control']); !!}
                        </div>
                            @error('name')
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
                        <div class="form-group">
                            <strong>Phone No.:</strong>
                            <div class="col-sm-5">
                                {!! Form::tel('phone', $contact->phone??'' , ['placeholder' => 'Phone Number' , 'class'=>'form-control']); !!}
                            </div>
                            @error('phone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <div class="col-sm-5">
                                {!!Form::text('email', $contact->email??'', ['placeholder' => 'abc@gmail.com' , 'class'=>'form-control']); !!}
                            </div>
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Contacts :</label>
                        <div class="col-sm-5">
                               @php
                                   $accounts = DB::table('accounts')->select('f_name','id')->get();
                               @endphp                                    
                                <select class="form-control" name="Account_id">
                                    @foreach($accounts as $account) 
                                    <option value= " {{ $account->id }} "> {{$account->f_name}} </option>
                                    @endforeach
                                </select>
                        </div>
                     </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                       
                        {!!Form::submit('Create Contact' , ['class'=>'btn btn-primary ml-3']);!!}
                    </div>
                </div>