@extends('client.layout.master')
@section('title' , 'Đặt hàng')
@section('css')
<link rel="stylesheet" href="{{asset('assets/client/css/Pay.css')}}">
@endsection
@section('content')
<div class="content padding-container text-center">
    <h3 class="title-page-name commom-title text-center">Thanh toán</h3>
    <p class="text-center color-text" style="max-width: 600px; margin: 0 auto;">Quý khách vui lòng thanh toán qua qr code dưới. Sau đó chúng tôi sẽ xử lý yêu cầu và mang đến cho quý khách sản phẩm tốt nhất (Lưu ý nếu đơn hàng chưa được thanh toán, chúng tôi sẽ không thể xác nhận và xử lý đơn.)</p>
    <form class="cart-box" action="{{route('order.store')}}" method="POST">
        @csrf
        <div class="">
            <h4 class="title-form">Thông tin của bạn</h4>
            <div class="">
                <input type="text" class="input-contact" name="name" readonly value="{{ auth()->user()->name }}"
                    placeholder="Tên của bạn ">
                @if ($errors->has('name'))
                <span style="color: red;text-align:left">{{$errors->first('name')}}</span>
                @endif
            </div>
            <input type="text" class="input-contact" readonly value="{{auth()->user()->email}}" name="email" placeholder="Email của bạn">
            @if ($errors->has('email'))
                <span style="color: red;text-align:left">{{$errors->first('email')}}</span>
                @endif
            <div class="form-grid-input">
                {{-- <input type="text" class="input-contact" name="address" placeholder="Địa chỉ của bạn ">
                @if ($errors->has('address'))
                <span style="color: red;text-align:left">{{$errors->first('address')}}</span>
                @endif --}}
            </div>
            <input type="text" class="input-contact" readonly name="phone" value="{{auth()->user()->phone}}" placeholder="Số điện thoại của bạn">
            @if ($errors->has('phone'))
            <span style="color: red;text-align:left">{{$errors->first('phone')}}</span>
            @endif
            <textarea class="input-contact-textarea" name="note" placeholder="Nội dung" name="">{{$cart ? $cart['note'] : ''}}</textarea>
            @if ($errors->has('note'))
            <span style="color: red;text-align:left">{{$errors->first('note')}}</span>
            @endif
        </div>
        <div class="total-money">
            <div class="order-box">
                <h4 class="title-form-order">Đơn hàng</h4>
                <h3 class="plus-cart">Dịch vụ</h3>
                <?php $sum=0?>
                @if ($cart)

                <?php $item = session('cart');  $sum+=$item['price'];  ?>
                <div class="plus-cart-provisional">
                    <h4>{{$item['name']}}</h4>
                    <h5><?=number_format($item['price'], 0 , '.')?>₫ </h5>
                </div>
                @endif
                <div class="plus-cart-provisional">
                    <h3 class="total-name" style="color: #8E0007">Tổng tiền</h3>
                    <h4 class="total-price"> <?=number_format($sum, 0 , '.')?>₫</h4>
                </div>
                <div class="img-qr" style="width: 250px; margin: 0 auto;">
                    <img src="https://eko.in/assets/img/bill-payment/QR.png" width="100%" alt="">
                </div>
                 <p class="order-note">Thanh toán theo cú pháp: Dichvu_sodienthoai (Thietkelogo_098132322)</p>
                <button href="" class="btn-check-out">Đặt ngay</button>
            </div>
        </div>
    </form>
</div>
@endsection