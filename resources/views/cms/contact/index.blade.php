@extends('cms.parent')

@section('title' , 'contact')

@section('main-title' , 'Index contact')

@section('sub-title' , 'index contact')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of contact</h3>

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
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Message</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($contacts as $contact )
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{$contact->mobile}}</td>
                    <td>{{$contact->message}}</td>

                    <td>
                        <div class="btn-group">
                              <a href="#" onclick="performDestroy({{$contact->id}} , this)"  class="btn btn-danger">Delete</a>
                          </div>

                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$contacts->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/contacts/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
