@extends('admin.layout.main')
@section('title' , 'Danh mục')
@section('content')
<div class="container">
    <div class="d-flex  justify-content-between align-item-center">
        <h3 class="my-3">Danh mục dịch vụ </h3>
        <button onclick="refresh()" class="btn btn-info back text-white mt-2">Refresh</button>
    </div>
    <div class="row">
        <div class="col-3">
            <h5 style="color: #D61C4E">Thêm danh mục</h5>
            <form class="mt-3" method="POST" action="{{route('cate.store')}}" enctype=multipart/form-data>
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                    <input required type="text" class="form-control" placeholder="Name" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ảnh Banner</label>
                    <input type="file" name="image" accept="image/*" onchange="loadFile(event)">
                    <div class="mt-2">
                        <img style="width:200px;height:200px;" id="output"
                            src="https://static.vecteezy.com/system/resources/previews/004/968/608/original/upload-or-add-a-file-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-button-icon-vector.jpg"
                            alt="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giới thiệu</label>
                    <textarea name="description" id="" cols="30" rows="7" class="form-control"></textarea>
                </div>

                <input type="hidden" name="room_id" value="1">
                {{-- <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Room</label>
                    <select name="room_id" class="form-select" aria-label="Default select example">
                        @foreach ($rooms as $item)
                        <option value="{{$item->id}}">{{$item->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <form method="GET" action="{{route('cate.index')}}" class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tìm kiếm bằng tên...</label>
                        <div class="row">
                            <input type="search" id="search-name" name="q" class="form-control" placeholder="*Enter to search ...">
                        </div>
                    </form>
                    <p id="log"></p>
                </div>
                {{-- <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Filter by room</label>
                        <select class="form-select" id="filter-room" aria-label="Default select example">
                            @foreach ($rooms as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>
            <div class="">
                <p style="color:green" id="message">

                </p>
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Room</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($cates as $item)
                        <tr>
                            <td id="id">{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><img width="150px" src="{{ asset('upload/' . $item->image) }}" alt=""></td>
                            <td>{{$item->room->name}}</td>
                            <td>
                                <select data-id="{{$item->id}}" class="form-select cate-status">
                                    <option @if($item->status == 1) selected @endif value="1">Active</option>
                                    <option @if($item->status == 0) selected @endif value="0">Unactive</option>
                                </select>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn btn-outline-warning"
                                            href="{{route('cate.edit',['id'=>$item->id])}}"><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>

                                        <a href="{{route('cate.delete' , $item->id)}}" id="showToastPlacement"
                                            onclick="return confirm('Do you want to delete this data?')"
                                            class="dropdown-item btn btn-outline-danger"><i
                                                class="bx bx-trash me-1"></i>
                                            Xóa</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-4">
                    {{ $cates->appends(request()->all())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('js/alert-action.js')}}"></script>
<script src="{{asset('js/filter-url.js')}}"></script>
<script>
// alert('uy');
//  console.log( $('.cate-status'));

$(document).ready(function() {
    $('.cate-status').on('change', function() {
        // alert($(this).data('id'));
        id = $(this).data('id');
        status = $('.cate-status').val();
        $.get("<?= route('cate.updateStatus') ?>", {
            id: id,
            status: status
        }, function($data) {
            configAlert($data);
        })
    });

    var url = window.location.href;
    var urlBase = window.location.href.split('?')[0];
    // Search by name
    // $('#search-name').keyUp(function() {

    //     checkOutUrl('q', $(this).val());
    //     document.querySelector('.q').value = $(this).val();
    //     // console.log(window.location.href);
    // })

    // Search by room_id
    $('#filter-room').on('change', function() {
        room_id = $(this).val();
        // alert(keywold)
        checkOutUrl('room_id', $(this).val());
    })

});
</script>
@endsection