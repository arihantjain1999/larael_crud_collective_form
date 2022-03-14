<div class="row mx-5 px-5" id="container">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                         <strong >First Name</strong>   
                        <div class="col-sm-5">
                                <!-- <input type="text" name="f_name" class="form-control" value="{{$account->f_name??''}}" placeholder="first Name" required> -->
                                {!! Form::text('f_name',$account-> f_name??'' , ['placeholder' => 'First Name' , 'class'=>'form-control']); !!}
                        </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                            <strong>Last Name:</strong>
                            <!-- <input type="text" name="l_name" class="form-control" value="{{$account->l_name??''}}" placeholder="Full Name"  required> -->
                            <div class="col-sm-5">
                                {!! Form::text('l_name',$account-> l_name??'' , ['placeholder' => 'Last Name' , 'class'=>'form-control']); !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOB:</strong>
                            <!-- <input type="date" name="dob" class="form-control" value="{{$account->dob??''}}" placeholder="Date Of Birth"  required> -->
                            <div class="col-sm-5">
                                {!!Form::date('dob', $account->dob??'' , ['class'=>'form-control'] );!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Phone No.:</strong>
                            <!-- <input type="tel" name="phone" class="form-control" value="{{$account->phone??''}}" placeholder="9876543210"  required> -->
                            <div class="col-sm-5">
                                {!! Form::tel('phone', $account->phone??'' , ['placeholder' => 'Phone Number' , 'class'=>'form-control']); !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <!-- <input type="email" name="email" class="form-control" value="{{$account->email??''}}" placeholder="abc@xyz.com"  required> -->
                            <div class="col-sm-5">
                                {!!Form::text('email', $account->email??'', ['placeholder' => 'abc@gmail.com' , 'class'=>'form-control']); !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Address:</strong>
                            <!-- <input type="text-box" name="address" class="form-control" value="{{$account->address??''}}" placeholder="Address"  required> -->
                            <div class="col-sm-5">
                                {!! Form::textarea('address',$account-> address??'' , ['placeholder' => 'Address', 'rows' => '2', 'cols' =>'25' , 'class'=>'form-control']); !!}
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender:</strong>
                            <div class="form-check">
                                <!-- <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" @if($account->gender??''=='Male') checked @endif> -->
                                {!! Form::radio('gender', 'Male');!!}
                                Male
                            </div>
                            <div class="form-check">
                                <!-- <input class="form-check-input" type="radio" name="gender" id="Female" value="Female"@if($account->gender??''=='Female'??'') checked @endif> -->
                                {!! Form::radio('gender', 'Female');!!}
                                    Female
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Hobby:</strong>
                            <div class="form-check">
                                <!-- <input class="form-check-input" name="hobby" type="checkbox" value="games" id="games" value="Games" @if($account->hobby??''=='games') checked @endif> -->
                                    {!! Form::checkbox('hobby[]', 'Games'); !!}
                                    Games
                            </div>
                            <div class="form-check">
                                <!-- <input class="form-check-input" name="hobby" type="checkbox" value="art" id="art" value="Art" @if($account->hobby??''=='art') checked @endif> -->
                                {!! Form::checkbox('hobby[]', 'Art'); !!}
                                    Art
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Country</label>
                        <div class="col-sm-5">
                            {!! Form::select('country', ['India' => 'India', 'Russia' => 'Russia', 'America' => 'America', 'Poland' => 'Poland'], null, ['class'=>'form-control']); !!}
                        </div>
                        
                        <!-- <select class="form-control" id="exampleFormControlSelect1" name="country">
                        <option value="india">India</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="china">China</option>
                        <option value="russia">russia</option>
                        </select> -->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                        <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->
                       
                        {!!Form::submit('Submit' , ['class'=>'btn btn-primary ml-3']);!!}
                    </div>
                </div>