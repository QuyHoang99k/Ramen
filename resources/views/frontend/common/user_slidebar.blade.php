@php
$id = Auth::user()->id;
$user = App\Models\User::find($id);
@endphp

<div class="col-md-2">
    <img src="{{ !empty($user->profile_photo_path)? url('upload/user_images/' . $user->profile_photo_path): url('upload/123.jpg') }}"
         style="border-radius: 50%;" alt=""  class="card-img-top">
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Thay Đổi Trang Cá Nhân</a>
        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Thay Đổi Mật Khẩu</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">Đơn Hàng</a>
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Đơn Hoàn Trả</a>
        <a href="{{ route('cancel.order') }}" class="btn btn-primary btn-sm btn-block">Đơn Hủy</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Đăng Xuất</a>
    </ul>
</div>
