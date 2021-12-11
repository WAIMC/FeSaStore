<div class="col-sm-2">
                                            @if($avg_rating)
                                            <p class="point">{{$avg_rating}}/5</p>
                                            @else
                                            <p class="point1">Chưa có</p>
                                            @endif
                                            <br>
                                            <p class="number_rating">{{$number_rating}} đánh giá</p>
                                            <ul class="review-list">
                                            <!-- Single Review List Start -->
                                            <li>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-7">
                                        @if(isset(Auth::guard('cus')->user()->id))
                                           
                                            <p class="star">Bạn chấm sản phẩm này bao nhiêu sao ?</p>
                                            <div id="rateYo" style="margin:0 auto"></div>
                                            <form>
                                                <input type="hidden" name="rating_star" value="5" id="rating_star">
                                                <input type="hidden" name="product_id" value="{{$product_id}}" >
                                                <input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}" >
                                            </form>
                                            </div>
                                            <div class="col-sm-3">
                                            <!-- Check xem tài khoản đã đánh giá sao cho sản phẩm này hay chưa -->
                                            @if($data_rating)
                                            <?php 
                                                $check = false;
                                                  foreach($data_rating as $rating){
                                                        if($rating->customer_id == Auth::guard('cus')->user()->id){
                                                            $check = true;
                                                        }
                                                }
                                            ?>
                                            @endif

                                            <!-- Hiển thị -->
                                            @if($check == true)
                                                <p>Bạn đã đánh giá cho sản phẩm này!</p>
                                            @else
                                                <button id="post_rating_star" class="customer-btn"> Gửi đánh giá của bạn</button>
                                            @endif
                                            </div>
                                            @else
                                            <div class="col-sm-3">
                                            <button class="customer-btn" disablded> Đăng nhập để đánh giá</button>
                                            </div>
                                        @endif
                                        </div>


<script>

$(function () {
 
 $("#rateYo").rateYo({
     rating: 5,
     fullStar: true
 }).on("rateyo.set",function(e,data){
     $('#rating_star').val(data.rating);
 });

 });
</script>