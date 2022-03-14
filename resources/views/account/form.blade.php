<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div class="form-group">
                            <strong>first Name:</strong>
                            <input type="text" name="f_name" class="form-control" value="{{$account->f_name??''}}" placeholder="first Name" required>
                            @error('f_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="l_name" class="form-control" value="{{$account->l_name??''}}" placeholder="Full Name"  required>
                            @error('l_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOB:</strong>
                            <input type="date" name="dob" class="form-control" value="{{$account->dob??''}}" placeholder="Date Of Birth"  required>
                            @error('dob')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Phone No.:</strong>
                            <input type="tel" name="phone" class="form-control" value="{{$account->phone??''}}" placeholder="9876543210"  required>
                            @error('phone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" class="form-control" value="{{$account->email??''}}" placeholder="abc@xyz.com"  required>
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Address:</strong>
                            <input type="text-box" name="address" class="form-control" value="{{$account->address??''}}" placeholder="Address"  required>
                            @error('address')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender:</strong>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" @if($account->gender??''=='Male') checked @endif>
                                <label class="form-check-label" for="Male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="Female" value="Female"@if($account->gender??''=='Female'??'') checked @endif>
                                <label class="form-check-label" for="Female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Hobby:</strong>
                            <div class="form-check">
                                <input class="form-check-input" name="hobby" type="checkbox" value="games" id="games" value="Games" @if($account->hobby??''=='games') checked @endif>
                                <label class="form-check-label" for="games">
                                    Games
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="hobby" type="checkbox" value="art" id="art" value="Art" @if($account->hobby??''=='art') checked @endif>
                                <label class="form-check-label" for="art">
                                    Art
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Country</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="country">
                        <option value="india">India</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="china">China</option>
                        <option value="russia">russia</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </div>