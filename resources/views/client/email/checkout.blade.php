<h3>Cảm ơn <i>{{ $name }}</i> đã đặt hàng tại FESASTORe</h3>
<h4>Đơn hàng #{{ $order->id }} <strong style="color: red">đang được xử lý</strong></h4>
<h4>Thông tin đơn hàng của bạn </h4>
<h4>Mã đơn hàng :{{ $order->id }} </h4>
    <h4>Ngày đặt :{{ $order->created_at, 'd-m-Y' }}</h4>
        <h4>Chi tiết sản phẩm</h4>
        <div style="width:100%;padding:20px ">
            <table border="1" cellspacing="0" cellpadding="10" style="width:600px;text-center ">
                <thead>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thuộc tính</th>
                    <th>Thành tiền</th>
                </thead>
                <tbody>
                    <?php $i=1;
                  //  
                    ?>
                    @foreach ($carts as $item)
                        <tr>

                            <td>{{$i}}</td>
                            <td class="product_name"><a href="#">{{ $item['name'] }}</a></td>
                            <td class="product-price">{{ $item['price'] }} VND</td>
                            <td class=""> {{ $item['quantity'] }} </td>
                            <td>  {{ $item['attr'] }}</p> 
                            </td>
                            <td class="product_total"> {{number_format($item['price'] * $item['quantity'] ) }}
                                VND</td>


                        </tr>
                        <?php $i++; ?>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Tổng tiền</th>
                        <td>{{number_format($cart->total_price )}} VND</td>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
