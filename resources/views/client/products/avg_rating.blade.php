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