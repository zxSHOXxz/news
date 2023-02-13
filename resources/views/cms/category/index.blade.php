@extends('cms.parent')

@section('title' , 'category')

@section('main-title' , 'Index category')

@section('sub-title' , 'index category')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Data of category</h3> --}}
          <a href="{{ route('categories.create') }}" type="submit" class="btn btn-primary">Add New category</a>

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
                <th>Category Name</th>
                <th>Description of category</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category )
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{$category->description}}</td>
                    {{-- <td>{{$category->cities_count}}</td> --}}
                    {{-- <td> <span class="badge bg-success">({{$category->cities_count}}) Cities </span> </td> --}}

                    <td>
                        <div class="btn-group">
                            <a href="{{route('categories.edit' , $category->id  )}}" type="button" class="btn btn-info">Edit</a>
                              <a href="#" onclick="performDestroy({{$category->id}} , this)"  class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-success">Show</button>
                          </div>

                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$categories->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/categories/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
