
@extends('dashboard.layouts.error')
{{-- define item for page error --}}
@section('title','404 Không Tìm Thấy')

@section('main')
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
          <h2 class="headline text-warning"> 404</h2>

          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Trang này không tìm thấy.</h3>

            <p>
                Chúng tôi không thể tìm kiếm trang bạn đang tìm kiếm.
              Trong khi đó, bạn có thể <a href="./">trở lại</a> hoặc tìm thử tìm kiếm form.
            </p>

            <form class="search-form">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm Kiếm">

                <div class="input-group-append">
                  <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
              <!-- /.input-group -->
            </form>
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
      <!-- /.content -->
@endsection

{{-- load css for page errors --}}
@section('css')
    
@endsection

{{-- load js for page errors --}}
@section('js')
    
@endsection
      