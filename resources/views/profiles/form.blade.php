@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <form action="{{ route('u.profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" class="form-control" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" id="url" name="url" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" name="picture" id="picture" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <br />
                        <input type="radio" checked id="male" value="male" name="gender" > <label for="male">Male</label>
                        <input type="radio" id="female" value="female" name="gender" > <label for="female">Female</label>
                        <input type="radio" id="other" value="other" name="gender" > <label for="other">Other</label>
                    </div>

                    <button class="btn btn-primary btn-lg">Create Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection
