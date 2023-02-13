@extends('cms.parent')

@section('title' , 'Slider')

@section('main-title' , 'Edit Slider')

@section('sub-title' , 'Edit Slider')


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
              <h3 class="card-title">Edit Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf
             
              <div class="card-body">
                <div class="row">

                <div class="form-group col-md-6">
                  <label for="title">Slider Title</label>
                  <input type="text" class="form-control" name="title" id="title"
                  value="{{ $sliders->title }}" placeholder="Enter Slider Title">
                </div>

                <div class="form-group col-md-6">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image of Author">
                </div>
              </div>
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                      <label for="description"> Description of Slider</label>
                          <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                          placeholder="Enter Description of Slider " cols="50">{{ $sliders->description}}</textarea>
                  </div>
              </div>
            </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">

                <button type="button" onclick="performUpdate({{$sliders->id}})" class="btn btn-primary">Store</button>
                <a href="{{ route('sliders.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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
    formData.append('title',document.getElementById('title').value);
    formData.append('image',document.getElementById('image').files[0]);
    formData.append('description',document.getElementById('description').value);
    storeRoute('/cms/admin/sliders_update/'+id , formData);

   }

</script>
@endsection
