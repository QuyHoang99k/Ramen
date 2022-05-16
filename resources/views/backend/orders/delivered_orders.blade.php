@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Đơn Hàng Đã Giao</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>Ngày Đặt </th>
                                            <th>Số Hóa Đơn </th>
                                            <th>Giá </th>
                                            <th>Phương Thức Thanh Toán </th>
                                            <th>Tình Trạng </th>
                                            <th>Quản Lý</th>

                                        </tr>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td> {{ $item->order_date }} </td>
                                                <td> {{ $item->invoice_no }} </td>
                                                <td> {{ number_format($item->amount) }} 円 </td>

                                                <td> {{ $item->payment_method }} </td>
                                                <td> <span class="badge badge-pill badge-primary">Giao Thành Công
                                                    </span> </td>

                                                <td width="25%">
                                                    <a href="{{ route('pending.order.details', $item->id) }}"
                                                        class="btn btn-info" title="Edit Data"><i
                                                            class="fa fa-eye"></i> </a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
