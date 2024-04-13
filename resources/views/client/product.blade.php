@extends('client.layout.master')
@section('title' , 'Dịch vụ')
@section('css')
<link rel="stylesheet" href="{{asset('/assets/client/css/Product.css')}}">
@endsection
@section('content')

<div class="banner">
    <img class="w-100" src="https://angito.com.vn/uploads/Giai-Phap-Thuong-Hieu/SME-Brand/SME.jpg" alt="">
</div>

<div class="content padding-container">
    <header class="header-content-box">
        <div class="icon-open-filer-all" onclick="openNavFilter()">
            <i class="fa-solid fa-arrow-down-short-wide"></i>
            Filter
        </div>
        <div class="title-box text-center">
            @if (!empty($parentCategory))
                <h3 class="commom-title">Dịch vụ thuộc danh mục '{{$parentCategory->name}}'</h3>
            @else
                <h3 class="commom-title">Tất cả dịch vụ của chúng tôi</h3>
            @endif
        </div>
        <div class="selected-box">
            <select class="select" id="filter-select" name="" id="">
                <option value="1">Mới nhất</option>
                <option value="2">Cũ nhất</option>
            </select>
        </div>
    </header>
    <div id="myNav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavFilter()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <button class="accordion">Loai hinh dịch vụ</button>
            <div class="panel">
                <ul>
                    <li><a href=""><i class="fa-solid fa-caret-right"></i> Tất cả dịch vụ</a></li>
                    @foreach ($rooms as $item)
                    <li class="room-item" style="cursor:pointer"  data-id="{{$item->id}}"><a><i class="fa-solid fa-caret-right"></i>{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <button class="accordion">Thương hiệu</button>
            <div class="panel">
                <ul>
                    @foreach ($cates as $item)
                    <li class="cate-item" style="cursor:pointer"  data-id="{{$item->id}}"><a  ><i class="fa-solid fa-registered"></i>{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <button class="accordion">GIÁ dịch vụ</button>
            <div class="panel">
                <ul>
                    <li><a href=""><i class="fa-solid fa-dollar-sign"></i> Dưới 500,000₫</a></li>
                    <li><a href=""><i class="fa-solid fa-dollar-sign"></i> 500,000₫ - 1,000,000₫</a></li>
                    <li><a href=""><i class="fa-solid fa-dollar-sign"></i> 1,000,000₫ - 1,500,000₫</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-list_box ">
        @foreach ($products as $item)
        <div class="product-item">
            <div class="product-item_img-box">
                <a href="{{route('client.product.detail' , $item->id)}}">
                    <img class="w-100" src="{{ asset('upload/' . $item->image) }}" alt="">
                </a>
                <div class="product-item_percent">-{{ceil(($item->price - $item->price_sale) * 100/$item->price)}}%</div>
                <a href="{{route('client.product.detail' , $item->id)}}" class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </a>
            </div>
            <p class="product-item_name"><a href="{{route('client.product.detail' , $item->id)}}">{{$item->name}}</a></p>
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

</div>
@endsection
@section('script')
<script src="{{asset('assets/client/js/filter-product.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#filter-select').on('change', function() {
            let valueSelect=  $(this).val();
            $.get("<?= route('client.service.filterSelect') ?>", {
                valueSelect: valueSelect,
                cate_id:{{$parentCategory ? $parentCategory->id : ''}}
            }, function($data) {
                $('.product-list_box').html($data);
        });
    });
    
    $('.cate-item').on('click' , function(){
        let cate_id =  $(this).data('id');
        $.get("<?= route('client.service.filterCate') ?>", {
            cate_id: cate_id
        }, function($data) {
        $('.product-list_box').html($data);
        })
    });
    $('.room-item').on('click' , function(){
        let room_id =  $(this).data('id');
        $.get("<?= route('client.service.filterRoom') ?>", {
            room_id: room_id
        }, function($data) {
        $('.product-list_box').html($data);
        })
    });
})
</script>
@endsection