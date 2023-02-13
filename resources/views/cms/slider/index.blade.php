@extends('cms.parent')

@section('title' , 'slider')

@section('main-title' , 'Index slider')

@section('sub-title' , 'index slider')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Data of slider</h3> --}}
          <a href="{{ route('sliders.create') }}" type="submit" class="btn btn-primary">Add New slider</a>

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
                <th>Image</th>
                <th>Slider Title</th>
                <th>Description of Slider</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($sliders as $slider )
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>
                      <img class="img-circle img-bordered-sm" src="{{asset('storage/images/slider/'.$slider->image)}}" width="60" height="60" alt="User Image">
                  </td>
                    <td>{{ $slider->title }}</td>
                    <td>{{$slider->description}}</td>
                   
                    <td>
                        <div class="btn-group">
                            <a href="{{route('sliders.edit' , $slider->id  )}}" type="button" class="btn btn-info">Edit</a>
                              <a href="#" onclick="performDestroy({{$slider->id}} , this)"  class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-success">Show</button>
                          </div>

                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$sliders->links()}}
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
