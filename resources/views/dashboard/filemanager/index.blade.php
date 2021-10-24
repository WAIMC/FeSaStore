{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Quản lý file')
@section('action', 'Trình quản lý file')

{{-- main section for master layout --}}
@section('main')
    <!-- Default box -->
    <div class="container">
       <div class="row">
        <div class="col-12">
            <iframe src="{{url('public/filemanager/dialog.php?akey=2ZIrXI03fit1oFZ3vLuPHQhDYBY1GcVeVZaNFvU')}}" frameborder="0" height="500px" width="100%"></iframe>     
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