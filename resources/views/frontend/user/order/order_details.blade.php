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

                <div class="col-md-5">
                    <div class="card">
                        <div class="cart-header">
                            <h4>Thông tin đơn hàng</h4>
                        </div>

                        <hr>
                        <div class="card-body" style="background: #E9EBEC">
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
                    </div>
                </div>


                <div class="col-md-5">
                    <div class="card">
                        <div class="cart-header">
                            <h4>Chi Tiết</h4>

                        </div>

                        <hr>
                        <div class="card-body" style="background: #E9EBEC">
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
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">



                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr style="background: #e2e2e2;">
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


                    </div> <!-- / end col md 8 -->

                </div> <!-- // END ORDER ITEM ROW -->

                @if ($order->status !== 'delivered')
                @else
                    @php
                        $order = App\Models\Order::where('id', $order->id)
                            ->where('return_reason', '=', null)
                            ->first();
                    @endphp


                    @if ($order)
                        <form action="{{ route('return.order', $order->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="label"> Lý do hoàn trả đơn hàng:</label>
                                <textarea name="return_reason" id="" class="form-control" cols="30" rows="05"></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger">Hoàn Trả</button>

                        </form>
                    @else
                        <span class="badge badge-pill badge-warning" style="background: red">Bạn đã gửi yêu cầu trả lại cho
                            sản phẩm này </span>
                    @endif
                @endif
                <br><br>


            </div>
        </div>
    </div>
@endsection
