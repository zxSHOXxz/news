@extends('cms.parent')

@section('title' , 'Role')

@section('main-title' , 'Edit Role')

@section('sub-title' , 'edit role')


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
              <h3 class="card-title">Create Role</h3>
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
                        
                        <option value="admin" @if($roles->guard_name == 'admin') selected @endif>Admin</option>
                        <option value="author" @if($roles->guard_name == 'author') selected @endif>Author</option>
                        {{-- <option value="web" @if($roles->guard_name == 'web') selected @endif>User</option> --}}

                    </select>
                </div>

                <div class="form-group">
                  <label for="name">Role Name</label>
                  <input type="text" class="form-control" name="name" id="name" 
                  value="{{$roles->name}}" placeholder="Enter Name of Role">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">

                <button type="button" onclick="performUpdate({{$roles->id}})" class="btn btn-primary">Store</button>
                <a href="{{ route('roles.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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
    storeRoute('/cms/admin/roles_update/'+id , formData);

   }

</script>
@endsection
