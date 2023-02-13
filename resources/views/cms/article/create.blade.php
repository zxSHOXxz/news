@extends('cms.parent')

@section('title' , 'Article')

@section('main-title' , 'Create Article')

@section('sub-title' , 'create Article')


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
              <h3 class="card-title">Create Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf
             
              <div class="card-body">

                <div class="row">
                    <input type="text" name="author_id" id="author_id" value="{{$id}}"
                    class="form-control form-control-solid" hidden/>

                    <div class="form-group col-md-6">
                        <label for="category_id"> Category Name</label>
                        <select class="form-control" name="category_id" style="width: 100%;"
                            id="category_id" aria-label=".form-select-sm example">
                            @foreach ($categories as $category )
                                <option value="{{ $category->id }}" >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">

                <div class="form-group col-md-6">
                  <label for="title">Article Name</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Article Title">
                </div>
                <div class="form-group col-md-6">
                  <label for="short_description">Article Description</label>
                  <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter short description of Article">
                </div>
            </div>
            <div class="row">
                  <div class="form-group col-md-12">
                      <label for="full_description"> Description of Article</label>
                          <textarea class="form-control" style="resize: none;" id="full_description" name="full_description" rows="4"
                          placeholder="Enter Description of Article " cols="50"></textarea>
                  </div>
                </div>
                <div class="row">

              <div class="form-group col-md-12">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image of Author">
              </div>
              </div>
              <!-- /.card-body -->
            </div>

              <div class="card-footer">

                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('articles.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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
    formData.append('short_description',document.getElementById('short_description').value);
    formData.append('full_description',document.getElementById('full_description').value);
    formData.append('image',document.getElementById('image').files[0]);
    formData.append('author_id',document.getElementById('author_id').value);
    formData.append('category_id',document.getElementById('category_id').value);

    store('/cms/admin/articles' , formData);

   }

</script>
@endsection
