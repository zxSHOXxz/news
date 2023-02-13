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
     
            <form action="" method="get" style="margin-bottom:2%;">
                <div class="row">
                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="Search By Name"
                           name='name' @if( request()->name) value={{request()->name}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>

                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="Search By Street"
                               name='street' @if( request()->street) value={{request()->street}} @endif/>
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

                <div class="col-md-4">
                      <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                      <a href="{{route('cities.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                      {{-- @can('Create-City') --}}
                          
                      <a href="{{route('cities.create')}}"><button type="button" class="btn btn-md btn-primary">اضافة مدينة </button></a>
                      {{-- @endcan --}}
                </div>

                     </div>
            </form>
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
                <th>Country Name</th>
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
                     <td> <span class="badge bg-success"> {{$city->country ? $city->country->name : "Not Value"}} </span></td>
                     {{-- <td> <span class="badge bg-success">({{$country->cities_count}}) Cities </span> </td> --}}

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
