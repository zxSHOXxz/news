@extends('cms.parent')

@section('title' , 'Category')

@section('main-title' , 'Create Category')

@section('sub-title' , 'create Category')


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
              <h3 class="card-title">Create Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf
             
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Category Name</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Category Title">
                </div>
                {{-- <div class="form-group">
                  <label for="description">Category Description</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Enter description of Category">
                </div> --}}

                <div class="col-md-12">
                  <div class="form-group">
                      <label for="description"> Description of Category</label>
                          <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                          placeholder="Enter Description of Category " cols="50"></textarea>
                  </div>
              </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">

                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('categories.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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
   function performStore(){

    let formData = new FormData();
    formData.append('title',document.getElementById('title').value);
    formData.append('description',document.getElementById('description').value);
    store('/cms/admin/categories' , formData);

   }

</script>
@endsection
