@extends('cms.parent')
@section('title', 'Viewers')


@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <a class="btn btn-success mb-2" href="{{ route('viewers.create') }}">Create viewer</a>

            <form action="{{ route('viewers.destroyAll') }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mb-2" type="submit">
                    Delete Allviewers
                </button>

            </form>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Viewers Table</h3>
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
                <div class="card-body table-responsive p-2">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th> Image</th>
                                <th> email</th>
                                <th> first name</th>
                                <th>city</th>
                                <th>gender</th>
                                <th>status </th>
                                <th>operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewers as $viewer)
                                <tr class="align-items-center">
                                    <td>{{ $viewer->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/viewer/' . $viewer->user->image) }}"
                                            style="border-radius: 50%" width="75px" height="75px" alt="">
                                    </td>
                                    <td>{{ $viewer->email }}</td>
                                    <td>{{ $viewer->user ? $viewer->user->first_name : 'no value' }}</td>
                                    <td>{{ $viewer->user ? $viewer->user->city->name : 'no value' }}</td>
                                    <td>{{ $viewer->user ? $viewer->user->gender : 'no value' }}</td>
                                    <td>{{ $viewer->user ? $viewer->user->status : 'no value' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href=" {{ route('viewers.edit', $viewer->id) }}"
                                                class="btn btn-warning">Edit</a>

                                            <button onclick="performDestroy({{ $viewer->id }} , this)" type="button"
                                                class="btn btn-danger">Delete</button>
                                        </div>

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $viewers->links() }}

                </div>

            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/cms/admin/viewers/' + id
            confirmDestroy(url, referance)
            console.log(referance)
        }
    </script>
@endsection
