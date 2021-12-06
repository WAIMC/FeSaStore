{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Bình luận sản phẩm ')
@section('action', 'Chỉnh sửa bình luận')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                {{-- card hearder --}}
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Chỉnh sửa bình luận</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('brand.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span>Danh sách liên kết</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('comment.update',$comment)}}" method="post" id="formEdit">
                                @csrf @method('PUT')
                                
                                <input type="hidden" name="id" value="{{$comment->id}}">
                                <input type="hidden" name="parent_id" value="{{$comment->parent_id}}">
                                <input type="hidden" name="comment" value="{{$comment->comment}}">
                                <input type="hidden" name="product_id" value="{{$comment->product_id}}">
                                <input type="hidden" name="customer_id" value="{{$comment->customer_id}}">

                                <div class="form-group">
                                <div class="mt-2"><label for="">Ẩn hay hiện bình luận của <span style="color:red">{{$comment->cus->name}}</span> về <span style="color:red">{{$comment->pro->name}}</span>  này ?</label></div>
                                <div class="form-group">
                                    <textarea name="comment" id="comment" aria-describedby="comment" class="form-control" disabled>{{$comment->comment}}</textarea>
                                </div>
                                <div class="form-inline">
                                   @if($comment->status == 0)
                                   <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="Special" name="status" value="0" checked>
                                        <label for="Special" class="custom-control-label">Hiện</label>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="Normal" name="status" value="1" >
                                        <label for="Normal" class="custom-control-label">Ẩn</label>
                                    </div>
                                   @else
                                   <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="Special" name="status" value="0" >
                                        <label for="Special" class="custom-control-label">Hiện</label>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="Normal" name="status" value="1" checked>
                                        <label for="Normal" class="custom-control-label">Ẩn</label>
                                    </div>
                                   @endif
                                </div>
                                </div>


                                <input type="submit" value="Cập nhật" class="btn btn-primary btnEdit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- customize load css for master layout --}}
@section('css')
    
@endsection

{{-- customize load js for master layout --}}
@section('js')
    {{-- swal --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>
@endsection