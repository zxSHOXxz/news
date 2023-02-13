@extends('cms.parent')

@section('title' , 'Permission')

@section('main-title' , 'Edit Permission')

@section('sub-title' , 'edit Permission')


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
              <h3 class="card-title">Edit Permission</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf

              <div class="card-body">
                <div class="form-group col-md-4">
                    <label for="guard_name"> Guard NAme </label>
                    <select class="form-control" name="guard_name" style="width: 100%;"
                        id="guard_name" aria-label=".form-select-sm example">
                        
                        <option value="admin" @if($permissions->guard_name == 'admin') selected @endif>Admin</option>
                        <option value="author" @if($permissions->guard_name == 'author') selected @endif>Author</option>
                        {{-- <option value="web" @if($Permissions->guard_name == 'web') selected @endif>User</option> --}}

                    </select>
                </div>

                <div class="form-group">
                  <label for="name">Permission Name</label>
                  <input type="text" class="form-control" name="name" id="name" 
                  value="{{$permissions->name}}" placeholder="Enter Name of Permission">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">

                <button type="button" onclick="performUpdate({{$permissions->id}})" class="btn btn-primary">Update</button>
                <a href="{{ route('permissions.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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
    formData.append('guard_name',document.getElementById('guard_name').value);
    formData.append('name',document.getElementById('name').value);
    storeRoute('/cms/admin/permissions_update/'+id , formData);

   }

</script>
@endsection
