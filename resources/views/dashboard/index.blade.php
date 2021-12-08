{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Bảng Điêu Khiển')
@section('action', 'Thống kê')

{{-- main section for master layout --}}
@section('main')
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $all_order->count() }}</h3>

                    <p>Tổng Đơn Hàng</p>
                </div>
                <div class="icon text-white">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('order.index') }}" class="small-box-footer">
                    Thông Tin Chi Tiết <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $all_comment->count() }}</h3>

                    <p>Tổng Bình Luận</p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                </div>
                <a href="{{ route('comment.index') }}" class="small-box-footer">
                  Thông Tin Chi Tiết <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $all_customer->count() }}</h3>

                    <p>Tổng Người Dùng</p>
                </div>
                <div class="icon text-white">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{ route('customer.index') }}" class="small-box-footer">
                  Thông Tin Chi Tiết <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $all_product->count() }}</h3>

                    <p>Tổng Sản Phẩm</p>
                </div>
                <div class="icon text-white">
                    <i class="fas fa-barcode"></i>
                </div>
                <a href="{{ route('product.index') }}" class="small-box-footer">
                  Thông Tin Chi Tiết <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
          <div class="col-md-12">
              <!-- AREA CHART -->
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Biểu Đồ Doanh Số</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="chart">
                          <div class="row">
                              <div class="col-5">
                                  <form class="form-inline">
                                      <div class="form-group">
                                          <label for="datepicker" class="mr-2">Từ Thời Điểm</label>
                                          <input type="text" name="fromDate" id="datepicker" class="form-control">
                                      </div>
                                  </form>
                              </div>
                              <div class="col-5">
                                  <form class="form-inline">
                                      <div class="form-group">
                                          <label for="datepicker2" class="mr-2">Đến Thời Điểm</label>
                                          <input type="text" name="toDate" id="datepicker2" class="form-control">
                                      </div>
                                  </form>
                              </div>
                              <div class="col-2">
                                  <button class="btn btn-success" type="submit" id="searchChart">Tìm Kiếm</button>
                              </div>
                          </div>
                          <div class="row" id="chart" style="height: 250px;"></div>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Thống Kê Tổng Sản Phẩm Của Thương Hiệu</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 241px; height: 241px; max-height: 241px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
          <!-- jQuery Knob -->
          <div class="card card-blue">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Thống kê Hóa Đơn
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6 col-md-6 text-center">
                    <input id="wait" type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#3c8dbc">
                    <div class="knob-label">Đang Xác Minh</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-6 col-md-6 text-center">
                    <input id="canncel" type="text" class="knob" value="" data-width="90" data-height="90" data-fgColor="#f56954">
                    <div class="knob-label">Hủy</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-6 text-center">
                    <input id="ship" type="text" class="knob" value="" data-width="90" data-height="90" data-fgColor="#932ab6">
                    <div class="knob-label">Đang Vận Chuyển</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-6 text-center">
                    <input id='complete' type="text" class="knob" value="" data-width="90" data-height="90" data-fgColor="#39CCCC">
                    <div class="knob-label">Hoàn Thành</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-7">
          {{-- latest Order Start --}}
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Đơn Hàng Gần Đây</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Khách Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Đặt</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($all_order as $recent_order)
                      <tr>
                        <td><a href="{{route('order.show', $recent_order->id)}}"> #{{ $recent_order->id }} </a></td>
                        <td> {{ $recent_order->name }} </td>
                        <td>
                          @php
                              $total = 0;
                          @endphp
                          @if (isset($recent_order->orderDetail))
                            @foreach ($recent_order->orderDetail as $get_total)
                                @php
                                  $total += $get_total->quantity * $get_total->price;
                                @endphp
                            @endforeach
                          @endif
                          {{ number_format($total) }} VNĐ
                        </td>
                        <td>
                          @if ($recent_order->status == 0)
                            <span class="badge badge-warning">Đang Xác Nhận</span> 
                          @elseif ($recent_order->status == 1)
                            <span class="badge badge-success">Đang Giao</span>
                          @elseif ($recent_order->status == 2)
                            <span class="badge badge-info">Hoàn Thành</span>
                          @elseif ($recent_order->status == 3)
                          <span class="badge badge-danger">Đã Hủy</span>
                          @endif
                        </td>
                        <td>
                          {{ $recent_order->created_at->format('d-m-Y') }}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="{{route('order.index')}}" class="btn btn-sm btn-secondary float-right">Xem Tất Cả Đơn Hàng</a>
            </div>
            <!-- /.card-footer -->
          </div>
          {{-- lastest Order End --}}
        </div>
        <div class="col-5">
          {{-- related Product start --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sản Phẩm Thêm Gần Đây</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($all_product as $related_pro)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ url('public/uploads') }}/{{ $related_pro->image }}" alt="Ảnh Sản Phẩm" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"> {{ $related_pro->name }}
                        <span class="badge badge-warning float-right"> {{ isset($related_pro->product_variantProduct->first()->price) ? $related_pro->product_variantProduct->first()->price : '' }} VNĐ</span></a>
                      <span class="product-description">
                        {{ $related_pro->short_desciption }}
                      </span>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="{{ route('product.index') }}" class="uppercase">Xem Tất Cả Sản Phẩm</a>
            </div>
            <!-- /.card-footer -->
          </div>
          {{-- related Product end --}}
          {{-- related Blog start --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bài Viết Thêm Gần Đây</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($all_blog as $related_blog)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ url('public/uploads') }}/{{ $related_blog->image }}" alt="Ảnh Sản Phẩm" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"> {{ $related_blog->title }}
                        <span class="badge badge-warning float-right"> Tác Giả : {{ $related_blog->getauthor->name }} </span></a>
                      <span class="product-description">
                        {!! $related_blog->content !!}
                      </span>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="{{ route('blog.index') }}" class="uppercase">Xem Tất Cả Bài Viết</a>
            </div>
            <!-- /.card-footer -->
          </div>
          {{-- related Blog end --}}
    </div>
@endsection


{{-- customize load css for master layout --}}
@section('css')
    {{-- css here --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

{{-- customize load js for master layout --}}
@section('js')
  {{-- js here --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(document).ready(function () {
      $(function() {

        /**
        * Start Douhnut
        */ 
        var all_brand = {!! $all_brand !!};
        var all_product = {!! $all_product !!};
        var labels_brand = [];
        var name_brand = [];
        var quantity_brand = [];
        
        all_brand.forEach(brand => {
          labels_brand[brand['id']] = {'name_brand' : brand['name'], 'quantity' : 0 };
          all_product.forEach(pro => {
            if(pro['brand_id'] == brand['id']){
              labels_brand[brand['id']]['quantity'] += 1 ;
            }
          });
        }); 

        labels_brand.forEach(data_brand => {
          name_brand.push(data_brand['name_brand']);
          quantity_brand.push(data_brand['quantity'])
        });

        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
                                  labels: name_brand,
                                  datasets: [
                                      {
                                        data: quantity_brand,
                                        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                                      }
                                  ]
                                }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
        /**
        *End Douhnut
        */ 

        /**
        * strart jQueryKnob
        * order status
        */
        var all_order = {!! $all_order !!};
        var total_order = {!! $all_order->count() !!}
        var status_waiting = 0;
        var status_shipping = 0;
        var status_completing = 0;
        var status_cannceling = 0;

        all_order.forEach(order => {
          status_waiting = order['status'] == 0 ? status_waiting+=1 : status_waiting+=0;
          status_shipping = order['status'] == 1 ? status_shipping+=1 : status_shipping+=0;
          status_completing = order['status'] == 2 ? status_completing+=1 : status_completing+=0;
          status_cannceling = order['status'] == 3 ? status_cannceling+=1 : status_cannceling+=0;
        });

        $('#wait').val(100*status_waiting/total_order);
        $('#ship').val(100*status_shipping/total_order);
        $('#complete').val(100*status_completing/total_order);
        $('#canncel').val(100*status_cannceling/total_order);

        $('.knob').knob({
        /*change : function (value) {
        //console.log("change : " + value);
        },
        release : function (value) {
        console.log("release : " + value);
        },
        cancel : function () {
        console.log("cancel : " + this.value);
        },*/

        draw: function () {

          // "tron" case
          if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
              ,
              sa  = this.startAngle          // Previous start angle
              ,
              sat = this.startAngle         // Start angle
              ,
              ea                            // Previous end angle
              ,
              eat = sat + a                 // End angle
              ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
              ea = this.startAngle + this.angle(this.value)
              this.o.cursor
              && (sa = ea - 0.3)
              && (ea = ea + 0.3)
              this.g.beginPath()
              this.g.strokeStyle = this.previousColor
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
              this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
          }
        }

        });
        /**
        * END JQUERY KNOB 
        */


        /*
        * Start Filter Chart
        *
        */ 

        // get datepicker 
        $( function() {
          $( "#datepicker" ).datepicker({
            "dateFormat":"yy-mm-dd"
          });
        });

        $( function() {
          $( "#datepicker2" ).datepicker({
            "dateFormat":"yy-mm-dd"
          });
        } );

        // printf 
        chart30day();

        var chart = new Morris.Area({
                      element: 'chart',
                      lineColor:['#819C79','#FC8710','#FF6541','#A4ADD3','#766B56'],
                      pointColor:['#ffffff'],
                      pointStrokeColor:['black'],
                      parseTime:false,
                      xkey: 'created_at',
                      ykeys: ['quantity', 'price', 'sales', 'profit'],
                      labels: ['Số Lượng', 'Giá', 'Doanh Số', 'Lợi Nhuận']
                    });
        
                    // chart.setData([{"name":"test bug","quantity":2,"price":100,"created_at":"2021-11-26","sales":200,"profit":60},
                    // {"name":"test bug","quantity":2,"price":100,"created_at":"2021-11-26","sales":200,"profit":60}]);

        // search chart with date
        $("#searchChart").click(function (e) { 
          e.preventDefault();
          var _token = $('input[name="_token"]').val();
          var from_date = $('input[name="fromDate"]').val();
          var to_date = $('input[name="toDate"]').val();
          $.ajax({
            url: "{{ route('admin.filter_chart_by_date') }}",
            type:'POST',
            data: {_token : _token, from_date : from_date, to_date : to_date},
            success: function(data) {
              chart.setData(data);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(errorThrown);
            }
          });
        });

        function chart30day() {
            var today = new Date();
            var getMonth = today.getUTCMonth()+1;
            var setYMD = today.getUTCFullYear() + "-" + getMonth + "-" + today.getDay();
            
            var day_last = new Date(today.setDate(today.getDay()-30));
            var getMonth2 = day_last.getMonth()+1;
            var setYMD2 = day_last.getFullYear() + "-" + getMonth2 + "-" + day_last.getDay();

            var _token = $('input[name="_token"]').val();

            $.ajax({
              url: "{{ route('admin.filter_chart_by_date') }}",
              type:'POST',
              data: {_token : _token, from_date : setYMD2, to_date : setYMD},
              success: function(data) {
                chart.setData(data);
              },
              error: function (data, textStatus, errorThrown) {
                  console.log(errorThrown);
              }
            });
        };

        /**
        * End Filter Chart
        */ 
      });
    });
  </script>
@endsection