<div class="row">
    <div class="col-12">
      @if (Session::has('success'))
          <div class="alert alert-success  alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              {{ Session::get('success') }}
          </div>
      @endif
      @if (Session::has('error'))
          <div class="alert alert-danger  alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              {{ Session::get('error') }}
          </div>
      @endif
    </div>
  </div>