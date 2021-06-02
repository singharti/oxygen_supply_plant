@extends('layouts.master')

@section('content')
<style>
    body {
        background: url('https://static-communitytable.parade.com/wp-content/uploads/2014/03/rethink-target-heart-rate-number-ftr.jpg') fixed;
        background-size: cover;
    }

    *[role="form"] {
        max-width: 530px;
        padding: 15px;
        margin: 0 auto;
        border-radius: 0.3em;
        background-color: #f2f2f2;
    }

    *[role="form"] h2 {
        font-family: 'Open Sans', sans-serif;
        font-size: 40px;
        font-weight: 600;
        color: #000000;
        margin-top: 5%;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 4px;
    }
</style>
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <form class="form-horizontal" method="post" role="form" action="" enctype="multipart/form-data">
        @csrf
        <h2>Booking Cylinder</h2>
        <div class="form-group">
            <label for="businessname" class="col-sm-3 control-label">Business Name*</label>
            <div class="col-sm-9">
                <input type="text" id="businessname" placeholder="Business Name" class="form-control @error('businessname') is-invalid @enderror" name="businessname" value="{{@$supplier_details->supplierDetail->business_name}}" disabled>
                @error('businessname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name*</label>
            <div class="col-sm-9">
                <input type="text" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email* </label>
            <div class="col-sm-9">
                <input type="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Covid 19*</label>
            <div class="col-sm-9">
                <select class="form-control form-select state @error('state') is-invalid @enderror" aria-label="Default select example" name="state" value="{{ old('state') }}">
                    <option selected value="">Select State</option>

                    <option data-id="" value="">Positive</option>
                    <option data-id="" value="">Negative</option>


                </select>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="confirm_password" class="col-sm-3 control-label">Date Covid 19*</label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control" id="date" placeholder="Enter End Date" name="end_date">

                @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
            <div class="col-sm-9">
                <input type="phoneNumber" id="phonenumber" placeholder="Phone number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('ponenumber') }}">
                @error('phonenumber')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3 ">Gender</label>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="femaleRadio" name="gender" value="female">Female
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="maleRadio" name="gender" value="male">Male
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="otherRadio" name="gender" value="other">Other
                        </label>
                    </div>
                </div>
                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="Address" class="col-sm-3 control-label">Address* </label>
            <div class="col-sm-9">
                <input type="text" id="address" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="State" class="col-sm-3 control-label">State* </label>
            <div class="col-sm-9">
                <select class="form-control form-select state @error('state') is-invalid @enderror" aria-label="Default select example" name="state" value="{{ old('state') }}">
                    <option selected value="">Select State</option>
                    @foreach(@$states as $state)
                    <option data-id="{{$state->id}}" value="{{$state->name}}">{{$state->name}}</option>
                    @endforeach

                </select>
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!-- <input type="number" id="state" placeholder="State" class="form-control"> -->
            </div>
        </div>
        <div class="form-group">
            <label for="City" class="col-sm-3 control-label">City* </label>
            <div class="col-sm-9">
                <select class="form-control form-select city @error('city') is-invalid @enderror" aria-label="Default select example" name="city" value="{{ old('city') }}">
                    <option selected value="{{ old('city') }}">Select City</option>

                </select>
                @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="Age" class="col-sm-3 control-label">Age* </label>
            <div class="col-sm-9">
                <input type="number" id="age" placeholder="Age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}">
                @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="aadhar_card" class="col-sm-3 control-label">Aadhar Card* </label>
            <div class="col-sm-9">
                <input type="number" id="aadhar_card" placeholder="Aadhar Card" class="form-control @error('aadhar_card') is-invalid @enderror" name="aadhar_card" value="{{ old('aadhar_card') }}">
                @error('aadhar_card')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="identity_proof" class="col-sm-3 control-label">Identity Proof*</label>
            <div class="col-sm-9">
                <!-- <input type="file" name="file" class="form-control"> -->
                <input type="file" id="identity_proof" class="@error('identity_proof') is-invalid @enderror" name="identity_proof" value="{{ old('identity_proof') }}" accept="image/png, image/gif, image/jpeg, image/jpg" enctype="multipart/form-data">
                @error('identity_proof')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Required fields</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form> <!-- /form -->
</div> <!-- ./container -->
<script src="{{ asset('js/booking.js') }}" defer></script>
@endsection