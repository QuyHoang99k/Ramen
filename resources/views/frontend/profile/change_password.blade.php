@extends('frontend.main_master')
@section('content')
    @php
    $user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    @endphp
    <style>
        .card-img-top {
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
                @include('frontend.common.user_slidebar');

                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span
                                class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> Update Your
                            Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.password.update') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password <span>
                                    </span></label>
                                <input type="password" id="current_password" name="oldpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password <span>
                                    </span></label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span>
                                    </span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
