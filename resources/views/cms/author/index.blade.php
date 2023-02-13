@extends('cms.parent')

@section('title' , 'author')

@section('main-title' , 'Index author')

@section('sub-title' , 'index author')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Data of Country</h3> --}}
          <a href="{{ route('authors.create') }}" type="submit" class="btn btn-primary">Add New author</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>image</th>
                <th>Full Name</th>

                <th>City</th>
                <th>Email</th>
                <th>Articles</th>
                <th>gender</th>
                <th>status</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($authors as $author )
                <tr>
                    <td>{{ $author->id }}</td>
                    {{-- <td>{{ $author->user->image }}</td> --}}
                    <td>
                      <img class="img-circle img-bordered-sm" src="{{asset('storage/images/author/'.$author->user->image)}}" width="60" height="60" alt="User Image">
                  </td>
                    <td>{{$author->user ? $author->user->first_name  . " " . $author->user->last_name : " "}}</td>
                    {{-- <td>{{ $author->user->city->name }}</td>  --}}
                    <td> <span class="badge bg-success"> {{$author->user->city ? $author->user->city->name : "Not Value"}} </span></td>

                    <td>{{$author->email}}</td>

                    <td><a href="{{route('indexArticle',['id'=>$author->id])}}"
                      class="btn btn-info">({{$author->articles_count}})
                      article/s</a> </td>


                    <td>{{$author->user ? $author->user->gender : " Not Value"}}</td>
                    <td>{{$author->user ? $author->user->status : "Not Value"}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('authors.edit' , $author->id  )}}" type="button" class="btn btn-info">Edit</a>
                              <a href="#" onclick="performDestroy({{$author->id}} , this)"  class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-success">Show</button>
                          </div>

                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$authors->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/authors/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
