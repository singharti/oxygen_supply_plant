@extends('layouts.dashboard_master')

@section('content')
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    @include('layouts.header')
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        @include('layouts.nav')
        <!-- Page content-->
        <div class="container-fluid">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="form-horizontal">
                <form class="form-horizontal" method="post" role="form" action="{{ route('consumer.booking.edit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control " name="consumer_id" value="{{base64_encode(@$consumer->id)}}" style="display:none">
                    <h2>Edit Booking Cylinder Details</h2>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="name" placeholder="Name" class="form-control " value="{{@$consumer->user->name}}" disabled>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email </label>
                        <div class="col-sm-9">
                            <input type="text" id="email" placeholder="Email" class="form-control " value="{{@$consumer->user->email}}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 ">Gender</label>
                        <div class="col-sm-9">
                            <input type="text" id="email" placeholder="Email" class="form-control " value="{{@$consumer->user->gender}}" disabled>


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Age" class="col-sm-3 control-label">Age </label>
                        <div class="col-sm-9">
                            <input type="" id="age" placeholder="Age" class="form-control " value="{{@$consumer->user->age}}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aadhar_card" class="col-sm-3 control-label">Aadhar Card </label>
                        <div class="col-sm-9">
                            <input type="" id="aadhar_card" placeholder="Aadhar Card" class="form-control " value="{{@$consumer->user->aadhar_card_number}}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="identity_proof" class="col-sm-3 control-label">Identity Proof</label>
                        <div class="col-sm-9">
                            <input type="" id="identity_proof" class="form-control" value="{{url('/') .'/stroage/image/' .@$consumer->user->identity_proof}}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control form-select state @error('state') is-invalid @enderror" aria-label="Default select example" name="status" value="">
                                <option value="">Select State</option>

                                <option value="pending" @if(@$consumer->status == 'pending') selected @endif>Pending</option>
                                <option value="process" @if(@$consumer->status == 'process') selected @endif>Process</option>
                                <option value="delivered" @if(@$consumer->status == 'delivered') selected @endif>Delivered</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Covid 19</label>
                        <div class="col-sm-9">
                            <input type="text" id="identity_proof" class="form-control" value="{{@$consumer->covid_19}}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_covid_19" class="col-sm-3 control-label">Date Covid 19</label>
                        <div class="col-sm-9">
                            <input type="" readonly class="form-control" id="date_covid_19" placeholder="Date Covid 19" value="{{strtotime(@$consumer->date_covid_19)}}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Address" class="col-sm-3 control-label">Address </label>
                        <div class="col-sm-9">
                            <input type="text" id="address" placeholder="Address" class="form-control " value="{{@$consumer->user->address}}" disabled>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="State" class="col-sm-3 control-label">State </label>
                        <div class="col-sm-9">

                            <input type="text" id="state" class="form-control" value="{{@$consumer->user->state}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="City" class="col-sm-3 control-label">City </label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{@$consumer->user->city}}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                        <div class="col-sm-9">
                            <input type="" id="phonenumber" class="form-control " value="{{@$consumer->user->phone_number}}" disabled>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Edit</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js')}}"></script>
@endsection