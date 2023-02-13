@extends('news.master')

@section('title' , 'ALL NEWS')

@section('styles')

@endsection
@section('content')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">{{$categories->title}}
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">{{$categories->title}}</li>
      </ol>

      @foreach($articles as $article)
      <!-- news title One -->
      <div class="row">
        <div class="col-md-7">
          <a href="newsdetailes.html">
            <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="{{asset('storage/images/article/' . $article->image)}}" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{$article->title}}</h3>
          <p>{{$article->short_description}}</p>
          <a class="btn btn-primary" href="{{ route('news.det' , $article->id)}}">View news title
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      @endforeach

      {{$articles->links()}}

      <!-- Pagination -->
      {{-- <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="newsdetailes.html" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul> --}}

    </div>
    <!-- /.container -->

    @endsection

    @section('scripts')

    @endsection
