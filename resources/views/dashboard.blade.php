@extends('frontend.main_master')
@section('content')
<style>
    .card-img-top{
        height: 100px;
        width: 100px;
        margin-left: 30px;
        margin-bottom: 20px;
        margin-top: 15px;
    }
</style>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/123.jpg') }}" style="border-radius: 50%;" alt="" class="card-img-top"  >
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> Welcome To Ramen Milo onlie</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
