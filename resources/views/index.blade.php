<!doctype html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/cover.jpeg')}}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/cover.jpeg')}}" />

    <title>Oxygen Supply Plant</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
</head>

<body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">As we have seen this pandemic situation where due to lack of oxygen in hospitals as well as individual patient homes who are home quarantined lost life. We want to build a web-based platform to help them to deliver oxygen cylinders as soon as possible without any hurdles by implementing all the government rules and regulations.</p>
                        <p class="text-muted">This system will work as a bridge between oxygen suppliers and consumers where every common person or hospital management can book the cylinders as per their requirement. Although every plant as per their own capacity generates oxygen and shows the real-time status of available cylinders.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0)" class="text-white">Follow on Twitter</a></li>
                            <!-- <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="javascript:void(0)" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    <strong>Oxygen Supply Plant</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Oxygen Supply Plant</h1>
                <p class="lead text-muted"> As we have seen this pandemic situation where due to lack of oxygen in hospitals as well as individual patient homes who are home quarantined lost life. We want to build a web-based platform to help them to deliver oxygen cylinders as soon as possible without any hurdles by implementing all the government rules and regulations.</p>
                <p class="lead text-muted">This system will work as a bridge between oxygen suppliers and consumers where every common person or hospital management can book the cylinders as per their requirement. Although every plant as per their own capacity generates oxygen and shows the real-time status of available cylinders.</p>

                <p>
                    <a href="{{ route('login') }}" class="btn btn-primary my-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary my-2">Register</a>
                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach(@$supplier_users as $user)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <!-- <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap"> -->
                            <div class="card-body">
                                <h5 class="jumbotron-heading"> <u><b>Bussiness Name </b> </u>- {{@$user->supplierDetail->business_name}}</h5>

                                @foreach($user->cylinder as $cylinder )
                                <p class="card-text">{{$cylinder->ltr}} Ltr - {{$cylinder->quantity}}</p>
                                @endforeach
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('booking.cylinder')}}/{{base64_encode($user->id)}}" class="btn btn-sm btn-outline-secondary">Book</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </main>

    <!-- <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
  </footer> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/holder.min.js')}}"></script>
</body>

</html>