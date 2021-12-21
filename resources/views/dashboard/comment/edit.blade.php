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
                            <h4>Ẩn / hiện bình luận</h4>
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
                            <form action="{{route('comment.update',$comment)}}" method="post" id="change-status">
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
                                        <input class="custom-control-input0" type="radio" id="Special" name="status" value="0" checked> <b>Hiện</b>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input0" type="radio" id="Normal" name="status" value="1" > <b>Ẩn</b>
                                    </div>
                                   @else
                                   <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input0" type="radio" id="Special" name="status" value="0" > <b>Hiện</b>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input0" type="radio" id="Normal" name="status" value="1" checked> <b>Ẩn</b>
                                    </div>
                                   @endif
                                </div>
                                </div>


                                <input type="button" onclick="ChangeStatus()" value="Cập nhật" class="btn btn-primary btnEdit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                {{-- card hearder --}}
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Trả lời bình luận</h4>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <!-- Trường hợp đã trả lời -->
                            @if($check_answer_comment == false)
                            
                                <form action="{{route('comment.update',$answer_comment)}}" method="post" id="update-answer">
                                    @csrf @method('PUT')

                                    <input type="hidden" name="id" value="{{$answer_comment->id}}">
                                    <input type="hidden" name="parent_id" value="{{$answer_comment->parent_id}}">
                                    <input type="hidden" name="product_id" value="{{$answer_comment->product_id}}">
                                    <input type="hidden" name="customer_id" value="{{Auth::guard('adminAuth')->user()->id }}">

                                    <div class="form-group">
                                    <div class="mt-2"><label for=""><span style="color:red">{{$comment->cus->name}}</span> đã nhận xét <span style="color:red">{{$comment->pro->name}}</span>  này là <span style="color:red">{{$comment->comment}}.</span> Bạn đã trả lời :</label></div>
                                    <div class="form-group">
                                        <textarea name="comment" id="comment" aria-describedby="comment" placeholder="Nhập câu trả lời ..." class="form-control" required>{{$answer_comment->comment}}</textarea>
                                    </div>
                                    </div>
                                      <div class="form-inline">
                                   @if($answer_comment->status == 0)
                                   <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input1" type="radio" name="status" value="0" checked> <b>Hiện</b>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input1" type="radio" name="status" value="1" > <b>Ẩn</b>
                                    </div>
                                   @else
                                   <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input1" type="radio" name="status" value="0" > <b>Hiện</b>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input1" type="radio" name="status" value="1" checked> <b>Ẩn</b>
                                    </div>
                                   @endif
                                </div>
                                <br>
                                    <input type="button" onclick="UpdateAnswer()" value="Chỉnh sửa" class="btn btn-danger btnInsert">
                                </form>
                            @else
                            <!-- Trường hợp chưa trả lời -->
                            <form action="{{route('comment.store')}}" id="formInsert" method="post">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                <input type="hidden" name="product_id" value="{{$comment->product_id}}">
                                <input type="hidden" name="customer_id" value="{{ Auth::guard('adminAuth')->user()->id }}">

                                <div class="form-group">
                                <div class="mt-2"><label for=""><span style="color:red">{{$comment->cus->name}}</span> đã nhận xét <span style="color:red">{{$comment->pro->name}}</span>  này là <span style="color:red">{{$comment->comment}}.</span> Trả lời bình luận ?</label></div>
                                <div class="form-group">
                                    <textarea name="comment" id="comment" aria-describedby="comment" placeholder="Nhập câu trả lời ..." class="form-control"></textarea>
                                </div>
                                </div>


                                <input type="submit" value="Trả lời" class="btn btn-success btnInsert">
                            </form>
                            @endif
                           
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
    <script>
          function ChangeStatus(){
              document.getElementById('change-status').submit();
          }

          function UpdateAnswer(){
              document.getElementById('update-answer').submit();
          }

    </script>
@endsection