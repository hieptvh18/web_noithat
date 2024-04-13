@extends('admin.layout.main')
@section('title' , 'Liên hệ')
@section('content')
<div class="container">
    <div class="d-flex  justify-content-between align-item-center">
        <h3 class="my-3"> Quản lí liên hệ</h3>
    </div>
    <h3 id="result"></h3>
    @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @elseif(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table">
        <thead>
            <tr class="text-nowrap">
                <th>ID</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Trạng thái</th>
                <th>Nội dung</th>
                <th>Ngày gửi</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    @if ($item->status == 1)
                    <span  class="bg-info p-1 rounded text-white">Chưa xác nhận</span>
                    @else {{--2--}}
                    <span  class="bg-success  p-1 rounded text-white">Đã xác nhận</span>
                    @endif
                </td>
                <td>{{substr($item->description,0,50)}}</td>
                <td>{{$item->created_at->format('H:i d/m/Y')}}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{route('contact.delete' , $item->id)}}" id="showToastPlacement"
                                onclick="return confirm('Bạn chắc chắn muốn xóa dữ liệu?')"
                                class="dropdown-item btn btn-outline-danger"><i class="bx bx-trash me-1"></i>
                                Xóa</a>
                            <a href="{{route('contact.updateStatus' , $item->id)}}" id="showToastPlacement"
                                class="dropdown-item btn btn-outline-success">
                                Xác nhận</a>
                        </div>
                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <div class="my-4 float-end">
        {{ $data->appends(request()->all())->links('pagination::bootstrap-4') }}
    </div>
    @endsection
    @section('script')


    @endsection