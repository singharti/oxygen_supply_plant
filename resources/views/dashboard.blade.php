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
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pending">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#process">Process</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#deliverred">Deliverred</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="all" class="container tab-pane active"><br>
                    @if(count(@$all_listing)>0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Consumer Name</th>
                                <th scope="col">Covid 19</th>
                                <th scope="col">Date Covid 19</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(@$all_listing as $listing)
                            <tr>

                                <td>{{ucfirst($listing->user->name)}}</td>
                                <td>{{ucfirst($listing->covid_19)}}</td>
                                <td>{{$listing->date_covid_19}}</td>
                                <td>{{ucfirst($listing->status)}}</td>
                                <td>
                                    <a href="{{route('booking.detail.view')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{route('booking.detail.edit')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3>Booking History Not Found</h3>
                    @endif
                </div>
                <div id="pending" class="container tab-pane fade"><br>

                    @if(count(@$pending_listing)>0)
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Consumer Name</th>
                                <th scope="col">Covid 19</th>
                                <th scope="col">Date Covid 19</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(@$pending_listing as $listing)
                            <tr>

                                <td>{{ucfirst($listing->user->name)}}</td>
                                <td>{{ucfirst($listing->covid_19)}}</td>
                                <td>{{$listing->date_covid_19}}</td>
                                <td>{{ucfirst($listing->status)}}</td>
                                <td>
                                    <a href="{{route('booking.detail.view')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{route('booking.detail.edit')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3>Booking History Not Found</h3>
                    @endif
                </div>
                <div id="process" class="container tab-pane fade"><br>
                    @if(count(@$process_listing)>0)
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Consumer Name</th>
                                <th scope="col">Covid 19</th>
                                <th scope="col">Date Covid 19</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(@$process_listing as $listing)
                            <tr>
                                <td>{{ucfirst($listing->user->name)}}</td>
                                <td>{{ucfirst($listing->covid_19)}}</td>
                                <td>{{$listing->date_covid_19}}</td>
                                <td>{{ucfirst($listing->status)}}</td>
                                <td>
                                    <a href="{{route('booking.detail.view')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{route('booking.detail.edit')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3>Booking History Not Found</h3>
                    @endif
                </div>
                <div id="deliverred" class="container tab-pane fade"><br>
                    @if(count(@$deliverred_listing)>0)
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Consumer Name</th>
                                <th scope="col">Covid 19</th>
                                <th scope="col">Date Covid 19</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(@$deliverred_listing as $listing)
                            <tr>

                                <td>{{ucfirst($listing->user->name)}}</td>
                                <td>{{ucfirst($listing->covid_19)}}</td>
                                <td>{{$listing->date_covid_19}}</td>
                                <td>{{ucfirst($listing->status)}}</td>
                                <td>
                                    <a href="{{route('booking.detail.view')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{route('booking.detail.edit')}}/{{base64_encode($listing->consumer_id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3>Booking History Not Found</h3>
                    @endif
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