@extends('admin.layout.main')
@section('title' , 'Danh mục')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="my-3">Chỉnh sửa danh mục dịch vụ </h3>
        <div>
            <a href="{{route('cate.index')}}" class="btn btn-primary">Quay lại trang danh sách</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="mt-3" method="POST" action="{{route('cate.update',['id'=>$cate->id])}}" enctype=multipart/form-data>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                    <input required type="text" value="{{$cate->name}}" class="form-control" placeholder="Name" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ảnh Banner</label>
                    <div class="d-flex">
                        <div>
                            <input type="file" name="image" accept="image/*" onchange="loadFile(event)">
                            <div class="mt-2">
                                <img style="width:200px;height:200px;" id="output"
                                    src="https://static.vecteezy.com/system/resources/previews/004/968/608/original/upload-or-add-a-file-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-button-icon-vector.jpg"
                                    alt="">
                            </div>
                        </div>
                        @if($cate->image)
                            <div>
                                <label for="">Ảnh cũ</label>
                                <img style="width:300px;height:130px;" id="output"
                                src="{{ asset('upload/' . $cate->image) }}"
                                alt="">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giới thiệu</label>
                    <textarea name="description" id="" cols="30" rows="7" class="form-control">{{$cate->description}}</textarea>
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