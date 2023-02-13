@extends('cms.parent')

@section('title' , 'City')

@section('main-title' , 'Edit City')

@section('sub-title' , 'edit city')


@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('cities.update' , $cities->id) }}"  method="POST">
              @csrf
              @method('PUT')

              @if($errors->any())
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                 @foreach($errors->all() as $error)
                  <li> {{ $error }} </li>
                 @endforeach
                </div>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>Success</h5>
                      {{session('message')}}
                </div>
                @endif
                
              <div class="card-body">
                <div class="form-group">
                  <label for="name">City Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{ $cities->name }}" placeholder="Enter City Name">
                </div>
                <div class="form-group">
                  <label for="street">Street Name</label>
                  <input type="text" class="form-control" name="street" id="street"
                  value="{{ $cities->street }}" placeholder="Enter Street">
                </div>
            
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('cities.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

              </div>
            </form>
          </div>
        
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

@endsection
