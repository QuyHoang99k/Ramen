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
           @include('frontend.common.user_slidebar');
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
