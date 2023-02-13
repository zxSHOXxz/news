@extends('cms.parent')

@section('title' , 'comment')

@section('main-title' , 'Index comment')

@section('sub-title' , 'index comment')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Data of comment</h3> --}}
          {{-- <a href="{{ route('comments.create') }}" type="submit" class="btn btn-primary">Add New comment</a> --}}

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
                <th>Comment text</th>
                <th>Article name</th>

                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($comments as $comment )
                <tr>
                    <td>{{ $comment->id }}</td>
                 
                    <td>{{ $comment->comment }}</td>
                    <td> <span class="badge bg-success">({{$comment->article->title}}) Article </span> </td>

                    <td>
                        <div class="btn-group">
                              <a href="#" onclick="performDestroy({{$comment->id}} , this)"  class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-success">Show</button>
                          </div>

                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$comments->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/comments/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
