<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>Milo Onlie Shop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Milo Onlie Shop Office
               Email:support@miloOnlie.com <br>
               Số Điện Thoại: 0899999999 <br>
               1Nishikawa Tokyo:#4 <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Tên:</strong> {{ $order->name }}<br>
           <strong>Email:</strong> {{ $order->email }} <br>
           <strong>Số Điện Thoại:</strong> {{ $order->phone }} <br>

           @php
            $div = $order->division->division_name;
            $dis = $order->district->district_name;
            $state = $order->state->state_name;
           @endphp

           <strong>Địa Chỉ:</strong> {{ $div }},{{ $dis }}.{{ $state }} <br>
           <strong>Mã Bưu Điện:</strong> {{ $order->post_code }}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Số Hóa Đơn:</span> #{{ $order->invoice_no}}</h3>
            Ngày Đặt Hàng: {{ $order->order_date }} <br>
             Delivery Date: {{ $order->delivered_date }} <br>
            Phương Thức Thanh Toán : {{ $order->payment_method }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Sản Phẩm</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Ảnh</th>
        <th>Tên Sản Phẩm</th>
        <th>Mã Sản Phẩm</th>

        <th>Số Lượng</th>
        <th>Giá Sản Phẩm </th>

        <th>Tổng Tiền </th>
      </tr>
    </thead>
    <tbody>

     @foreach($orderItem as $item)
      <tr class="font">
        <td align="center">
            <img src="{{ asset($item->product->product_thambnail)  }}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center"> {{ $item->product->product_name_en }}</td>



        <td align="center">{{ $item->product->product_code }}</td>
        <td align="center">{{ $item->qty }}</td>
        <td align="center">{{ number_format($item->price) }}円</td>
        <td align="center">{{ number_format($item->price * $item->qty) }}円 </td>
      </tr>
      @endforeach

    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Tổng Tiền:</span>{{ number_format($order->amount) }}円</h2>
            <h2><span style="color: green;">Tổng Tiền Thanh Toán:</span> {{ number_format($order->amount) }}円</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Cảm ơn đã luôn tin dùng..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
