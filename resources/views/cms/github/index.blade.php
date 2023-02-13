@extends('cms.parent')

@section('title' , 'City')

@section('main-title' , 'Index City')

@section('sub-title' , 'index city')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Data of City</h3> --}}
          <a href="{{ route('cities.create') }}" type="submit" class="btn btn-primary">Add New City</a>

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
                <th>City Name</th>
                <th>Street Name</th>
                <th>Created AT</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($cities as $city )
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{$city->street}}</td>
                    <td>{{$city->created_at}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('cities.edit' , $city->id  )}}" type="button" class="btn btn-info">Edit</a>
                            
                            <form action="{{route('cities.destroy' , $city->id )}}"  method="POST">
                            @csrf
                            @method ('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" class="btn btn-success">Show</button>
                          </div>

                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$cities->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

@endsection
