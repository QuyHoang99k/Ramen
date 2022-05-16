@extends('frontend.main_master')
@section('content')
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
                @include('frontend.common.user_slidebar')
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="table-reponsive">
                        <table class="table">
                            <tbody>
                                <tr style="background: #e2e2e2">
                                    <td class="col-md-1">
                                        <label for="">Ngày </label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Tổng Tiền</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Phương thức thanh toán</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Số hóa đơn</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Tình trạng đơn hàng</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quản lý đơn hàng</label>
                                    </td>
                                </tr>

                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for="">{{ $order->order_date }} </label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ number_format($order->amount) }}円</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $order->payment_method }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $order->invoice_no }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">
                                                @if ($order->status == 'pending')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #800080;"> Chưa được giải quyết </span>
                                                @elseif($order->status == 'confirm')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #0000FF;"> Đã được xác nhận </span>
                                                @elseif($order->status == 'processing')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #FFA500;"> Đang được xử lý </span>
                                                @elseif($order->status == 'shipped')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #808080;"> Đang vận chuyển </span>
                                                @elseif($order->status == 'delivered')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #008000;"> Giao hàng thành công </span>

                                                    @if ($order->return_order == 1)
                                                        <span class="badge badge-pill badge-warning"
                                                            style="background:red;">Hoàn trả đơn hàng </span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #FF0000;"> Cancel </span>
                                                @endif
                                            </label>
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ url('user/order_details/' . $order->id) }}"
                                                class="btn btn-sm btn-primary"> <i class="fa-solid fa-eye"></i>Xem đơn
                                                hàng</a>
                                            <a href="{{ url('user/order/tracking/' . $order->id) }}" style="margin-top: 5px" type="button" class="btn btn-primary">
                                                     <i class=" fa-solid fa-check"></i> Tình trạng
                                                đơn hàng</a>
                                            <a href="{{ url('user/invoice_download/' . $order->id) }}"
                                                style="margin-top: 5px" class="btn btn-sm btn-danger"> <i
                                                    class="fa-solid fa-download"></i>
                                                Tải hóa đơn
                                            </a>
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


   
@endsection
