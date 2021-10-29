
@extends('dashboard.layouts.error')
{{-- define item for page error --}}
@section('title','500 đang gặp sự cố')

@section('main')
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
          <h2 class="headline text-danger">500</h2>
  
          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Trang web đang bị sự cố.</h3>
  
            <p>
              Chúng tôi sẽ khắc phục sự cố đó ngay lập tức.
              Trong khi đó, bạn có thể <a href="./">Trở lại</a> hoặc tìm kiếm form.
            </p>
  
            <form class="search-form">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm">
  
                <div class="input-group-append">
                  <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
              <!-- /.input-group -->
            </form>
          </div>
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
      