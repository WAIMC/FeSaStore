
@extends('dashboard.layouts.error')
{{-- define item for page error --}}
@section('title','403 Không được phép')

@section('main')
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
          <h2 class="headline text-lightblue"> 403</h2>

          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-lightblue"></i> Oops! Trang này Không cho phép.</h3>

            <p>
                Chúng tôi không thể cho phép trang bạn đang tìm kiếm.
              Trong khi đó, bạn có thể<a href="./">Trở lại</a> hoặc thử tìm kiếm.
            </p>

            <form class="search-form">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm Kiếm">

                <div class="input-group-append">
                  <button type="submit" name="submit" class="btn btn-text-lightblue"><i class="fas fa-search"></i>
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
      