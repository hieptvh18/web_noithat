@extends('admin.layout.main')
@section('title', 'Order Detail')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/product/product.css') }}">
@endsection
@section('content')
    <div class="container">
        <a href="{{ route('order.index') }}" class="btn btn-primary mt-4"><-- Quay lại trang danh sách</a>
                <div class="d-flex my-4 product-info-box" style="height:500px">
                    <div class="col-4 product-info bg-primary text-white">
                        <h4 class="text-white">Chi tiết đơn hàng</h4>
                        <h6 class="text-white">Ngày đặt : {{ $orderDetail->created_at->format('H:i d/m/Y') }}</h6>
                        <h6 class="text-white">Ngày cập nhật : {{ $orderDetail->updated_at->format('H:i d/m/Y') }}</h6>
                        <h6 class="text-white">Khách hàng : {{ $orderDetail->name }}</h6>
                        <h6 class="text-white">Email : {{ $orderDetail->email }}</h6>
                        <h6 class="text-white">Điện thoại : {{ $orderDetail->phone }}</h6>
                        <select class="form-select" data-id="{{ $orderDetail->id }}" aria-label="Default select example">
                            <option @if ($orderDetail->status == 0) selected @endif value="0">Đang chờ duyệt</option>
                            <option @if ($orderDetail->status == 1) selected @endif value="1">Đang xử lý</option>
                            <option @if ($orderDetail->status == 2) selected @endif value="2">Huỷ đơn</option>
                            <option @if ($orderDetail->status == 3) selected @endif value="3">Hoàn thành đơn hàng
                            </option>
                        </select>
                        <h6 class="text-white mt-4">Yêu cầu của khách : {{ $orderDetail->note }}</h6>
                        <h4 class="my-3 text-white">Tổng tiền : <?= number_format($sum, 0, '.') ?>₫</h4>
                    </div>
                    <div class="col-8 product-info-right table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Ảnh</th>
                                    <th>Giá tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $index = 0; ?>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td><img style="height:50px" src="{{ asset('upload/' . $item->image) }}"
                                                alt=""></td>
                                        <td> <?= number_format($item->price, 0, '.') ?>₫</td>
                                        <td><a onclick="return confirm('Do you want to delete this line? ')"
                                                href="{{ route('order.deleteOrderDetail', $item->id) }}"
                                                class="btn btn-danger"><i class='bx bxs-calendar-x'></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- gui thiet ke cho khach --}}
                        <h4 class="text-primary">Gửi thiết kế cho khách hàng</h4>
                        <ul class="send-design">
                            <li>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Hình ảnh</label>
                                        <br>
                                        <input type="file" name="image" accept="image/*" onchange="loadFile(event)">
                                        <br>
                                        <div class="d-flex">
                                            @if (false)
                                                <img src="{{ asset('upload/' . $prodDetail->image) }}" width="300px"
                                                    class="mt-3" alt="image">
                                            @else
                                                <div class="mt-2 col-3">
                                                    <img style="width:150px;height:150px;" id="output"
                                                        src="https://static.vecteezy.com/system/resources/previews/004/968/608/original/upload-or-add-a-file-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-button-icon-vector.jpg"
                                                        alt="">
                                                </div>
                                                <div class="col-9">
                                                    listing desin sent
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @section('script')
                <script src="{{ asset('js/alert-action.js') }}"></script>
                <script>
                    $(document).ready(function() {
                        $('.form-select').on('change', function() {
                            status = $(this).val();
                            order_id = $(this).data('id');
                            $.get("<?= route('order.updateStatus') ?>", {
                                status: status,
                                order_id: order_id
                            }, function($data) {
                                configAlert($data);
                                // $('#message').html($data);
                            });
                        });
                    })
                </script>
            @endsection
        @endsection
