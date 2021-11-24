@extends('client.layouts.master')
@section('title','Danh sách yêu thích')
@section('main')

<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                <li class="active"><a href="#">Danh sách yêu thích</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<div class="cart-main-area ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if (count($wishlist->items)>0 )
                <!-- Form Start -->
              
                <form action="#" id="change-cart">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive">
                        <table >
                            <thead>
                                <tr>
                                    <th class="product-remove">Xóa</th>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-name">Phân loại</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="change-cart">
                               
                      
                                {{-- {{dd($wishlist)}} --}}
                                   @foreach ($wishlist->items as $item)
                                    <tr>
                                        <td class="product-remove"> 
                                            <a href="#" ><i class="fa fa-times"  onclick="deleteWishlistitem({{$item['id'] }})" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{url('public/thumbs')}}/{{$item['image'] }}" alt="cart-image"></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{$item['name'] }}</a></td>                                    
                                        <td class="product-quantity">{{$item['attr'] }}</td>
                                        <td class="product-price"><span class="amount">{{ number_format($item['price'] )  }} VND</span></td>
                                        <td class="product-quantity"><span>{{$item['quantity'] }}</span></td>
                                        <td class="product-subtotal" >
                                            <div class="buttons-cart">
                                            {{-- <form action="{{ route('cart.add') }}" id="form-add" method="post"> --}}
                                                @csrf
                                                <input type="hidden" class="quantity mr-15 " name="quantity" type="number" value="1">
                                                <input type="hidden" value="{{$item['id'] }}" name="id_variant" id="id_variant">
                                                    <div class="actions-primary">
                                                        <a href="#" id="add_cart_detail" title="thêm" data-original-title="Thêm vào giỏ hàng">
                                                            + Thêm vào giỏ</a>
                                                    </div>
                                            {{-- </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                   @endforeach 
                               
                             
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                  
                </form>
                <!-- Form End -->
                @if (Session::has('success'))
              <div class="alert alert-success  alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
                  {{ Session::get('success') }}
              </div>
          @endif
          @else
          <h5>Danh sách yêu thích của bạn đang trống</h5>
                @endif
                
            </div>
        
        </div>
         <!-- Row End -->
    </div>
</div>
@endsection
@section('js')
<script>
    function updateWishlist(qty,id){
        $.get(
            '{{route('wishlist.update')}}',
            {
                quantity:qty,
                id:id
            },
            function(res){
               Render(res)
                alertify.success('Cập nhật thành công');
            }
        ).fail(function() {
            alertify.error('Xóa thất bại');;
  });;
       
    }
    function deleteWishlistitem(id){
        $.get(
            '{{url('')}}/wishlist/remove/'+id,
            {
                id:id
            },
            function(res){
              Render(res);
                alertify.success('Xóa thành công');
                location.reload();
            }
        ).fail(function() {
            alertify.error('Xóa thất bại');;
  });
       
    }
    function  Render(res) {
                $('#change-wishlist').empty();
                $('#change-wishlist').html(res);
    }
</script>

<script>
     $('#add_cart_detail').click(function(e) {
            e.preventDefault();
          console.log($("input[name=id_variant]").val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'get',
                url:  '{{url('')}}/cart/add/'+$("input[name=id_variant]").val(),
                data: {
                    quantity: $("input[name=quantity]").val(),
                    id: $("input[name=id_variant]").val()
                },
                success: function(response) {
                    $('#cart-box-width').empty();
                    $('#cart-box-width').html(response);
                    $('.total-pro').text($('#quantity_cart').val());
                    alertify.success('Đã thêm vào giỏ hàng');
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        });
</script>

@endsection