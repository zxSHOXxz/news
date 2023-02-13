@extends('cms.parent')
@section('title', 'Edit Viewer')


@section('styles')
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Viewer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('viewers.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $viewer->email }}">

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter password .. " value="{{ $viewer->email }}">
                </div>
                <div class="form-group">
                    <label for="first_name"> viewer first name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $viewer->user->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name"> viewer last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $viewer->user->last_name }}">
                </div>
                <div class="form-group">
                    <label for="mobile"> Mobile </label>
                    <input type="text" class="form-control" id="mobile" name="mobile"
                        value="{{ $viewer->user->mobile }}">
                </div>
                <div class="form-group">
                    <label for="date"> viewer date </label>
                    <input type="date" class="form-control" id="date" name="date"
                        value="{{ $viewer->user->date }}">
                </div>
                <div class="form-group">
                    <label for="address"> viewer address </label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ $viewer->user->address }}">
                </div>
                <div class="form-group">
                    <select name="gender" id="gender">gender

                        <option value="{{ $viewer->user->gender }}" selected>{{ $viewer->user->gender }}</option>
                        @if ($viewer->user->gender === 'male')
                            <option value="female">female</option>
                        @else
                            <option value="male">male</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select name="status" id="status">status

                        <option value="{{ $viewer->user->status }}" selected>{{ $viewer->user->status }}</option>

                        @if ($viewer->user->status === 'active')
                            <option value="inactive">inactive</option>
                        @else
                            <option value="active">active</option>
                        @endif

                    </select>
                </div>

                <div class="form-group">
                    <select name="city_id" id="city_id">city

                        <option value="{{ $viewer->user->city_id }}" selected>{{ $viewer->user->city->name }}</option>
                        @foreach ($cities as $city)
                            @if ($city->name !== $viewer->user->city->name)
                                <option value="{{ $city->id }}"> {{ $city->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="image"> image </label>
                    <input type="file" class="form-control" id="image" name="image" value="{{ $viewer->user->image }}" placeholder="Upload-image">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $viewer->id }})" class="btn btn-warning">update</button>
                <a class="btn btn-secondary" href="{{ route('viewers.index') }}">Go to viewers Table </a>
            </div>
        </form>
    </div>
@endsection


@section('scripts')

    <script>
        function performUpdate(id) {
            let formData = new FormData();
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('city_id', document.getElementById('city_id').value);
            storeRoute('/cms/admin/viewers_update/' + id, formData);
        }
    </script>
@endsection
