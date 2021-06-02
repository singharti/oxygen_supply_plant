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
            <div class="form-horizontal">
                <h2>Booking Cylinder Details</h2>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" placeholder="Name" class="form-control " name="name" value="{{@$consumer->user->name}}" disabled>

                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email </label>
                    <div class="col-sm-9">
                        <input type="text" id="email" placeholder="Email" class="form-control " name="email" value="{{@$consumer->user->email}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 ">Gender</label>
                    <div class="col-sm-9">
                        <input type="text" id="email" placeholder="Email" class="form-control " name="email" value="{{@$consumer->user->gender}}" disabled>


                    </div>
                </div>

                <div class="form-group">
                    <label for="Age" class="col-sm-3 control-label">Age </label>
                    <div class="col-sm-9">
                        <input type="" id="age" placeholder="Age" class="form-control " name="age" value="{{@$consumer->user->age}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label for="aadhar_card" class="col-sm-3 control-label">Aadhar Card </label>
                    <div class="col-sm-9">
                        <input type="" id="aadhar_card" placeholder="Aadhar Card" class="form-control " name="aadhar_card" value="{{@$consumer->user->aadhar_card_number}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label for="identity_proof" class="col-sm-3 control-label">Identity Proof</label>
                    <div class="col-sm-9">
                        <input type="" id="identity_proof" class="form-control" name="identity_proof" value="{{url('/') .'/stroage/image/' .@$consumer->user->identity_proof}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <input type="text" id="identity_proof" class="form-control" name="identity_proof" value="{{@$consumer->status}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Covid 19</label>
                    <div class="col-sm-9">
                        <input type="text" id="identity_proof" class="form-control" name="identity_proof" value="{{@$consumer->covid_19}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label for="date_covid_19" class="col-sm-3 control-label">Date Covid 19</label>
                    <div class="col-sm-9">
                        <input type="" readonly class="form-control" id="date_covid_19" placeholder="Date Covid 19" name="date_covid_19" value="{{strtotime(@$consumer->date_covid_19)}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <label for="Address" class="col-sm-3 control-label">Address </label>
                    <div class="col-sm-9">
                        <input type="text" id="address" placeholder="Address" class="form-control " name="address" value="{{@$consumer->user->address}}" disabled>

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
                        <input type="phoneNumber" id="phonenumber" placeholder="Phone number" class="form-control " name="phonenumber" value="{{@$consumer->user->phone_number}}" disabled>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js')}}"></script>
@endsection