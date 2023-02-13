@extends('cms.parent')

@section('title' , 'article')

@section('main-title' , 'Index article')

@section('sub-title' , 'index article')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">
          <a href="{{ route('createArticle' , $id) }}" type="submit" class="btn btn-primary">Add New article</a>

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
        </div> --}}

           <div class="card-header ">
            <form action="" method="get" style="margin-bottom:2%;">
                <div class="row">
                  <div class="input-icon col-md-2">
                      <input type="text" class="form-control" placeholder="Search By Title"
                         name='title' @if( request()->title) value={{request()->title}} @endif/>
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                      </div>

                      <div class="input-icon col-md-2">
                      <input type="text" class="form-control" placeholder=" General Search"
                         name='short_description' @if( request()->short_description) value={{request()->short_description}} @endif/>
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                      </div>

                      <div class="input-icon col-md-2">
                      <input type="date" class="form-control" placeholder="Search By Date"
                         name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                      </div>

                <div class="col-md-6">
                    <button class="btn btn-danger btn-md" type="submit">Filter</button>
                    <a href="{{ route('indexArticle' , $id) }}" class="btn btn-danger btn-md" type="submit">End Filter</a>
                    <a href="{{ route('categories.index') }}" type="button"  class="btn btn-primary">Category</a>
                    <a href="{{ route('authors.index') }}" type="button"  class="btn btn-info">Author</a>
                    <a href="{{ route('createArticle' , $id) }}" class="btn btn-success" style="color: white;"> Add new Article </a>

                </div>



              </div>
                </form>
      
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Article Name</th>
                <th>Image</th>
                <th>Short Description</th>
                <th>Category</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($articles as $article )
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                      <img class="img-circle img-bordered-sm" src="{{asset('storage/images/article/'.$article->image)}}" width="60" height="60" alt="User Image">
                    </td>
                    <td>{{$article->short_description}}</td>
                    {{-- <td>{{$article->cities_count}}</td> --}}
                    <td> <span class="badge bg-success">{{$article->category->title}} Category </span> </td>

                    <td>
                        <div class="btn-group">
                            <a href="{{route('articles.edit' , $article->id  )}}" type="button" class="btn btn-info">Edit</a>
                              <a href="#" onclick="performDestroy({{$article->id}} , this)"  class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-success">Show</button>
                          </div>

                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{-- {{$articles->links()}} --}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/articles/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
