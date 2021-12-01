{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh Mục Phân Quyền')
@section('action', 'Cập Nhật Phân Quyền')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Cập Nhật Phân Quyền</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 m-auto">
                            <form action="{{ route('decentralize.update', [$get_admin->id, 'id'=>$get_admin->id]) }}" id="formEdit" method="POST">
                                @csrf @method('PUT')
    
                                <div class="form-group">
                                  <label for="name">Tên</label>
                                  <input type="text"
                                    class="form-control" name="name" value="{{  $get_admin->name }}" id="name" aria-describedby="" placeholder="Name">
                                </div>
    
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text"
                                        class="form-control" name="email" value="{{  $get_admin->email }}" id="email" aria-describedby="" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label>Phân Quyền</label>
                                    <select class="select2" name="role[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach ($get_role as $role)
                                        <?php $checked = in_array($role->name, $role_assignment) ? 'checked' : ''; ?>
                                            <option class="role_{{$role->id}}" value="{{$role->id}}" {{$checked}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
    
                                <button type="button" class="btn btn-outline-dark btnEdit">Cập Nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{-- Footer --}}
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- customize load css for master layout --}}
@section('css')
    {{-- css here --}}
    {{-- load css for multiple select --}}
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

{{-- customize load js for master layout --}}
@section('js')
    {{-- load js for multiple select --}}
    <script src="{{ url('public/dashboard') }}/plugins/select2/js/select2.full.min.js"></script>
    {{-- swal --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>
    <script>
        $(document).ready(function () {
            // checked form with data admin_role
            var admin_id = {!! $get_admin->id !!};
            var checked_form = {!! json_encode($getRoleChecked->toArray()) !!}
            var get_role = {!! json_encode($get_role->toArray()) !!};
            checked_form.forEach(element => {
                if(element['admin_id'] == admin_id){
                    get_role.forEach(role => {
                        if($('.role_'+role['id']).val()==role['id']){
                            $('.role_'+role['id']).prop('checked', true);
                        }
                    });
                }
            });

            // multiple select
            $('.select2').select2();
        });
    </script>
@endsection