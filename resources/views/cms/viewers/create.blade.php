@extends('cms.parent')
@section('title', 'Create Viewer')


@section('styles')
@endsection

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create Viewer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('viewers.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email .. ">

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter password .. " value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <label for="first_name"> viewer first name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        placeholder="viewer name .. ">
                </div>
                <div class="form-group">
                    <label for="last_name"> viewer last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        placeholder="viewer last name .. ">
                </div>
                <div class="form-group">
                    <label for="mobile"> Mobile </label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="viewer Mobile .. ">
                </div>
                <div class="form-group">
                    <label for="date"> viewer date </label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="viewer date .. ">
                </div>
                <div class="form-group">
                    <label for="address"> viewer address </label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="viewer date .. ">
                </div>
                <div class="form-group">
                    <select name="gender" id="gender">gender

                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="status" id="status">status

                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="city_id" id="city_id">city

                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}"> {{ $city->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="image"> File </label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Upload-image">
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-success">Create</button>
                <a class="btn btn-secondary" href="{{ route('viewers.index') }}">Go to viewers Table </a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

    <script>
        function performStore() {
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

            store('/cms/admin/viewers', formData);
        }
    </script>
@endsection
