@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">Dashboard</div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    You are logged in!
                </div>
            </div> -->
            <!-- <div class="card">hh</div> -->
            <!-- <img src="..." alt="..." class="img-thumbnail"> -->
            <!-- <form class="form form-vertical" action="/avatar_upload.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="kv-avatar">
                        <div class="file-loading">
                            <input id="avatar-1" name="avatar-1" type="file" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form> -->
            <form action="{{ url('images') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" name="profile_image" id="exampleInputFile">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
