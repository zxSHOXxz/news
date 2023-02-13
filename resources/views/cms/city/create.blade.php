@extends('cms.parent')

@section('title' , 'City')

@section('main-title' , 'Create City')

@section('sub-title' , 'create city')


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
              <h3 class="card-title">Create City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('cities.store')}} " method='POST' >
                @csrf
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

                    <div class="row">
                       <div class="form-group col-md-4">
                    <label for="country_id">اسم الدولة</label>
                    <select class="form-control" name="country_id" style="width: 100%;"
                        id="country_id" aria-label=".form-select-sm example">
                        @foreach ($countries as $country )
                            <option value="{{ $country->id }}" >{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div> 

           
            <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="name">City Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter City Name">
                </div>
           </div>

            <div class="form-group col-md-4">
                  <label for="street">Street Name</label>
                  <input type="text" class="form-control" name="street" id="street" placeholder="Enter Street">
                </div>

              </div>
              </div>

              <!-- /.card-body -->

              <div class="card-footer">

                <button type="submit" class="btn btn-primary">Store</button>
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
