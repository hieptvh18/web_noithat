@extends('client.layout.master')
@section('title' , 'Trang chủ')
@section('css')
<link rel="stylesheet" href="{{asset('/assets/client/css/Home.css')}}">
@endsection
@section('content')

<div class="banner">
    {{-- <img class="w-100" style="height: 737px" src="" alt=""> --}}
    <img class="w-100" src="https://angito.com.vn/uploads/Banner/Banner%20trang%20ch%E1%BB%A7-16.jpg" alt="">
    <div class="banner-sub_box  padding-container">
        <div class="banner-sub_img-box">
            <img class="w-100 h-100"
                src="https://www.adina.vn/assets/projects/autocare/showcase-vn-auto-4-570x367.jpg"
                alt="">
        </div>
        <div class="banner-sub_img-box">
            <img class="w-100 h-100 "
            src="https://www.adina.vn/assets/projects/t-flower/showcase-tflowers7-570x367.jpg"
                alt="">
        </div>
        <div class="banner-sub_img-box">
            <img class="w-100 h-100 "
                src="https://www.adina.vn/assets/projects/bmsc/thiet-ke-nhan-dien-thuong-hieu-bmsc-14-570x367.jpg"
                alt="">
        </div>
    </div>
</div>
<div class="content">
    <h3 class="header-footer-title commom-title text-center">
        Dịch vụ nổi bật
    </h3>
    <p class="text-center color-text">Cập nhật những dịch vụ nổi bật</p>
    <div class="product-list_box padding-container">
        @foreach ($products as $item)
        <!-- {{$item->id}} -->
        <div class="product-item">
            <div class="product-item_img-box">
                <a href="{{route('client.product.detail' , $item->id)}}">
                    <img class="w-100" src="{{ asset('upload/' . $item->image) }}" alt="">
                </a>
                <div class="product-item_percent">-{{ceil(($item->price - $item->price_sale) * 100/$item->price)}}%
                </div>
                <a href="{{route('client.product.detail' , $item->id)}}" class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </a>
            </div>
            <p class="product-item_name"><a href="{{route('client.product.detail' , $item->id)}}">{{$item->name}}</a>
            </p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    <?=number_format($item->price_sale, 0 , '.')?>₫
                </div>
                <div class="product-price_sale">
                    <?=number_format($item->price, 0 , '.')?>₫
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <h3 class="header-footer-title commom-title text-center" style="margin-top:50px">
        Dịch vụ mới nhất
    </h3>
    <p class="text-center color-text">Cập nhật các dịch vụ mới nhất</p>
    <div class="product-list_box padding-container">
        @foreach ($productMoreView as $item)
        <div class="product-item">
            <div class="product-item_img-box">
                <a href="{{route('client.product.detail' , $item->id)}}">
                    <img class="w-100" src="{{ asset('upload/' . $item->image) }}" alt="">
                </a>
                <div class="product-item_percent">-{{ceil(($item->price - $item->price_sale) * 100/$item->price)}}%
                </div>
                <a href="{{route('client.product.detail' , $item->id)}}" class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </a>
            </div>
            <!-- {{$item->quantity_view}} -->
            <p class="product-item_name"><a href="{{route('client.product.detail' , $item->id)}}">{{$item->name}}</a>
            </p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    <?=number_format($item->price_sale, 0 , '.')?>₫
                </div>
                <div class="product-price_sale">
                    <?=number_format($item->price, 0 , '.')?>₫
                </div>

            </div>
        </div>
        @endforeach

    </div>

    <div class="category_image-box padding-container">
        {{-- dich vu(category) --}}
        <div class="category_image-above-box ">
            <div class="category_image-above-left">
                <div class="category_image-item-box">
                    <img src="https://lh4.googleusercontent.com/proxy/A7rcTzu7G5mzwihDWKjpAaHdhgwmNPh5maVgBssrln5Fx74q7TbBjs5NYk_JnTR_r3_wnHOOHhhCGpNTZ7IDtB92UgZ42KSkzr5v01OgSIlztJt8uw"
                        alt="Avatar" class="image">
                    <div class="overlay">
                        <div class="text">Dịch vụ chuyển đổi số</div>
                    </div>
                </div>
                <div class="category_image-item-box" style="margin-top: 25px">
                    <img src="https://www.gosell.vn/blog/wp-content/uploads/2023/06/banner-online-01.jpg"
                        alt="Avatar" class="image">
                    <div class="overlay">
                        <div class="text">Dịch vụ thiết kế banner</div>
                    </div>
                </div>
            </div>
            <div class="category_image-above-right">
                <div class="category_image-item-box">
                    <img src="https://i.pinimg.com/736x/a4/89/13/a48913daea801deb1eaaad21f01bbc0c.jpg"
                        alt="Avatar" class="image">
                    <div class="overlay">
                        <div class="text">Dịch vụ chiến lược marketing</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- doi tac --}}
        <div class="category_image-down-box">
            <div class="category_image-item-box">
                <img style="height: 100%; object-fit: cover;" src="https://www.adina.vn/assets/projects/elecom/elecom-showcase-06-1-570x367.png"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Thiết kế nhận diện thương hiệu ELECOM</div>
                </div>
            </div>
            <div class="category_image-item-box">
                <img style="height: 100%; object-fit: cover;" src="https://www.adina.vn/assets/projects/nhu-an/thiet-ke-thuong-hieu-kien-truc-nhu-an-570x367.jpg"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Thiết kế nhận diện thương hiệu NHƯ AN</div>
                </div>
            </div>
            <div class="category_image-item-box">
                <img style="height: 100%; object-fit: cover;" src="https://www.adina.vn/assets/projects/t-flower/showcase-tflowers7-570x367.jpg"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Thiết kế nhận diện thương hiệu TFLOWERS</div>
                </div>
            </div>
            <div class="category_image-item-box">
                <img style="height: 100%; object-fit: cover;" src="https://theme.hstatic.net/1000409762/1000752712/14/img_collection_info_3.jpg?v=10"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Thiết kế nhận diện thương hiệu VIETNAM AUTO CARE</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection