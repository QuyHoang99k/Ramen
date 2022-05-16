@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Thông Tin </strong> </h4>
                        </div>
                        <table class="table">


                            <tr>
                                <th>Tên người nhận : </th>
                                <th>{{ $order->name }}</th>
                            </tr>
                            <tr>
                                <th>Phone : </th>
                                <th>{{ $order->phone }}</th>
                            </tr>
                            <tr>
                                <th>Email : </th>
                                <th>{{ $order->email }}</th>
                            </tr>
                            <tr>
                                <th>Đơn vị giao hàng : </th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>
                            <tr>
                                <th><span class="text-danger">Mã đơn hàng: {{ $order->invoice_no }}</span> </th>

                            </tr>

                        </table>
                    </div>
                </div> <!--  // cod md -6 -->


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Chi Tiết Đơn Hàng</strong></h4>
                        </div>

                        <table class="table">

                            <tr>
                                <th>Khu vực : </th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>
                            <tr>
                                <th>Mã bưu điện : </th>
                                <th>{{ $order->post_code }}</th>
                            </tr>
                            <tr>
                                <th>Ngày đặt hàng : </th>
                                <th>{{ $order->order_date }}</th>
                            </tr>
                            <tr>
                                <th> Tổng Tiền : </th>
                                <th>{{ number_format($order->amount) }}円 </th>
                            </tr>
                            <tr>
                                <th> Order : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #418DB9;">{{ $order->status }} </span>
                                </th>
                            </tr>
                            <tr>
                                <th> </th>
                                <th>
                                    @if ($order->status == 'pending')
                                        <a href={{ route('pending-confirm', $order->id) }}" id="confirm"
                                            class="btn btn-block btn-success">Xác nhận đơn hàng</a>
                                    @elseif($order->status == 'confirm')
                                        <a href={{ route('shipped.delivered', $order->id) }}" id="delivered"
                                            class="btn btn-block btn-success">Đã Giao</a>
                                    {{-- @elseif($order->status == 'confirm')
                                        <a href="{{ route('shipped.delivered', $order->id) }}"
                                            class="btn btn-block btn-success" id="delivered">Đã Giao</a> --}}
                                    @endif
                                </th>
                            </tr>
                        </table>




                    </div>
                </div> <!--  // cod md -6 -->



                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                        </div>
                        <table class="table">
                            <tbody>

                                <tr>
                                    <td class="col-md-1">
                                        <label for=""> Ảnh</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Tên Sản Phẩm </label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Mã Sản Phẩm</label>
                                    </td>




                                    <td class="col-md-1">
                                        <label for=""> Số Lượng </label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Giá Sản Phẩm </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Tải Hóa Đơn </label>
                                    </td>

                                </tr>


                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""><img src="{{ asset($item->product->product_thambnail) }}"
                                                    height="50px;" width="50px;"> </label>
                                        </td>

                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->product_name_en }}</label>
                                        </td>


                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>



                                        <td class="col-md-2">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ number_format($item->price) }}
                                                円 ( {{ number_format($item->price * $item->qty) }}円
                                                ) </label>
                                        </td>


                                        @php

                                            $file = App\Models\Product::where('id', $item->product_id)->first();
                                        @endphp

                                        <td class="col-md-1">
                                            @if ($order->status == 'pending')
                                                <strong>
                                                    <span class="badge badge-pill badge-success"
                                                        style="background: #418DB9;"> No File</span> </strong>
                                            @elseif($order->status == 'confirm')
                                                <a target="_blank"
                                                    href="{{ asset('upload/pdf/' . $file->digital_file) }}">
                                                    <strong>
                                                        <span class="badge badge-pill badge-success"
                                                            style="background: #FF0000;"> Download Ready</span>
                                                    </strong> </a>
                                            @endif


                                        </td>





                                    </tr>
                                @endforeach





                            </tbody>

                        </table>
                    </div>


                </div> <!--  // cod md -12 -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
