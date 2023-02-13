<?php
use App\Models\Category;
$categories = Category::take(3)->orderBy('created_at' ,'desc')->get();
// $categories = Category::where('status' , 'active')->get();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NEWS | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('website/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('website/css/modern-business.css')}}" rel="stylesheet">
    @yield('styles')

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">news</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">home</a>
                </li>
                @foreach ( $categories as $category )
                <li class="nav-item">
                    <a class="nav-link" href="all-news.html">{{$category->title}} NEWS</a>
                </li>
                @endforeach
             
              
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

@yield('content')
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Momen Sisalem 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('website/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

@yield('scripts')
</body>

</html>
