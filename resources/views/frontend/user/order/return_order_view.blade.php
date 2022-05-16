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
                <div class="col-md-1"></div>
                <div class="col-md-9" style="margin-top: 15px">
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
                                        <label for="">Lý do hoàn trả</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Tình trạng </label>
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
                                        <td class="col-md-3">
                                            <label for="">{{ $order->return_reason }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">
                                                @if ($order->return_order == 0)
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #418DB9;"> Không có yêu cầu trả lại </span>
                                                @elseif($order->return_order == 1)
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #800000;"> Chưa được giải quyết </span>
                                                    <span class="badge badge-pill badge-warning" style="background:red;">Yêu
                                                        cầu trả lại hàng </span>
                                                @elseif($order->return_order == 2)
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #008000;">Đã hoàn trả thành công </span>
                                                @endif

                                            </label>
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ url('user/order_details/' . $order->id) }}"
                                                class="btn btn-sm btn-primary"> <i class="fa-solid fa-eye"></i>Xem đơn
                                                hàng</a>
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
