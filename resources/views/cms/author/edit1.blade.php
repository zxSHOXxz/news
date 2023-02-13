@extends('cms.parent')

@section('title' , 'Country')

@section('main-title' , 'Edit Country')

@section('sub-title' , 'edit country')


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
              <h3 class="card-title">Edit Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              @csrf
     
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Edit Country Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{ $countries->name }}" placeholder="Enter Country Name">
                </div>
                <div class="form-group">
                  <label for="code">Edit Code</label>
                  <input type="text" class="form-control" name="code" id="code"
                  value="{{ $countries->code }}" placeholder="Enter code">
                </div>
            
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{$countries->id}})" class="btn btn-primary">Update</button>
                <a href="{{ route('countries.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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

<script>
   function performUpdate(id){

  let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('code',document.getElementById('code').value);
    storeRoute('/cms/admin/countries_update/'+id , formData);
   }
</script>
@endsection
