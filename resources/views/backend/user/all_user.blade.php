@extends('admin.admin_master')
@section('admin')
    < class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">

        </div>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách người dùng <span class="badge badge-pill badge-danger" >{{ count($users) }}</span></h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Trạng thái</th>
                                            <th>Quản lý</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><img src="{{ !empty($user->profile_photo_path)? url('upload/user_images/' . $user->profile_photo_path): url('upload/123.jpg') }}"
                                                        alt="" style="width:70px;height:60px"></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>

                                                <td>
                                                    @if ($user->UserOnline())

                                                    <span class="badge badge-pill badge-success">Hoạt Động</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>

                                                    @endif
                                                   </td>

                                                <td>
                                                    <a href="" class="btn btn-info" title="Edit Data"><i
                                                            class="fa fa-pencil"></i> </a>
                                                    <a href="" class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </section>
        </div>
    @endsection
