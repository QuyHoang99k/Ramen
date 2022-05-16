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
                            <h3 class="box-title">Return Orders List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ngày đặt </th>
                                            <th>Số hóa đơn </th>
                                            <th>Tổng tiền </th>
                                            <th>Phương thức thanh toán </th>
                                            <th>Tình Trạng </th>
                                            <th>Xử lý</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($orders as $item)
                                       @if ($item->return_order != 0)
                                       <tr>
                                        <td> {{ $item->order_date }} </td>
                                        <td> {{ $item->invoice_no }} </td>
                                        <td> {{ number_format($item->amount) }} 円</td>

                                        <td> {{ $item->payment_method }} </td>
                                        <td>
                                            @if ($item->return_order == 1)
                                                <span class="badge badge-pill badge-danger">Chưa xử lý </span>
                                            @elseif($item->return_order == 2)
                                                <span class="badge badge-pill badge-success">Thành công </span>
                                            @endif

                                        </td>
                                        @if ($item->return_order == 1)
                                        <td width="25%">
                                            <a href="{{ route('return.approve', $item->id) }}"
                                                class="btn btn-danger">Xác nhận hoàn trả </a>
                                        </td>
                                        @elseif($item->return_order == 2)
                                        <td width="25%">
                                            <a href="#"
                                                class="btn btn-success">Đã nhận hàng hoàn trả </a>
                                        </td>
                                        @endif


                                    </tr>


                                       @endif

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
