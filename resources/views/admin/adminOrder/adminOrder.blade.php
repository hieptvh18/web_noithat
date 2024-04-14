@extends('admin.layout.main')
@section('title' , 'Đặt hàng')
@section('content')
<div class="container">
    <div class="d-flex  justify-content-between align-item-center">
        <h3 class="my-3">Quản lý đặt hàng</h3>
    </div>
    <h3 id="result"></h3>
    <div class="d-flex justify-content-end align-item-center">
        <form method="GET" class="col-5" action="{{route('order.index')}}" class="mb-3">
            <div class="row">
                <input type="search" id="search-name" name="q" class="form-control" placeholder="*Tìm kiếm bằng tên, điện thoại ...">
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr class="text-nowrap">
                <th>ID</th>
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Ngày đặt</th>
                <th>Ngày cập nhật</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($orders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><a href="{{route('order.detail' , $item->id)}}">{{$item->name}}</a></td>
                <td>{{$item->phone}}</td>
                <td>{{$item->created_at->format('H:i d/m/Y')}}</td>
                <td>{{$item->updated_at->format('H:i d/m/Y')}}</td>
                <td>
                    @if ($item->status == 0)
                    <span  class="bg-info p-1 rounded text-white">Đang chờ duyệt</span>
                    @elseif ($item->status == 2)
                    <span   class="bg-danger p-1 rounded text-white">Hủy đơn</span>
                    @elseif ($item->status == 3)
                    <span  class="bg-success p-1 rounded text-white">Hoàn thành đơn hàng</span>
                    @else
                    <span  class="bg-primary  p-1 rounded text-white">Đang xử lý</span>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{route('order.delete' , $item->id)}}" id="showToastPlacement"
                                onclick="return confirm('Do you want to delete this data?')"
                                class="dropdown-item btn btn-outline-danger"><i class="bx bx-trash me-1"></i>
                                Xóa</a>
                                <a href="{{route('order.detail' , $item->id)}}" id="showToastPlacement"
                                    class="dropdown-item btn btn-outline-warning">
                                    Cập nhật</a>
                        </div>
                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <div class="my-4 float-end">
        {{ $orders->appends(request()->all())->links('pagination::bootstrap-4') }}
    </div>
    @endsection
    @section('script')


    @endsection