{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'S')
@section('action', 'Trang Chủ')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                {{-- card hearder --}}
                <div class="card-header">

                    {{-- header Setting Link --}}
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Chỉnh sửa liên kết</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('settingLink.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span>Danh sách liên kết</span>
                            </a>
                        </div>
                    </div>
                       
                    {{-- select by choose --}}
                  
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('settingLink.update',$settingLink->id)}}" method="post">
                        @csrf @method('PUT')
                        <div class="form-group">
                          <label for="">Tên liên kết</label>
                          <input type="text" name="config_key" id="" class="form-control" value="{{$settingLink->config_key}}" aria-describedby="helpId">
                           @error('config_key')
                            <small  class="text-danger">{{$message}}</small> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Value</label>
                            <input type="text" name="config_value" id="" class="form-control" value="{{$settingLink->config_value}}" aria-describedby="helpId">
                             @error('config_value')
                            <small  class="text-danger">{{$message}}</small> 
                            @enderror
                          </div>
                          <input type="hidden" name="id" value="{{$settingLink->id}}">
                          <input type="submit" value="Cập nhật" class="btn btn-primary">
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
    
@endsection