@if($data_commentblog && $data_commentblog->count() > 0)
                                @foreach($data_commentblog as $commentblog)
                                <div class="row iconcustomer">
                                            <div class="col-1">
                                                <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:135%">
                                            </div>
                                            <div class="col-11">
                                                <p class="review-mini-title-comment">{{$commentblog->cus->name}} <span class="time"> bình luận vào lúc {{ date('H:i d-m-Y ',strtotime($commentblog->created_at))}}</span></p> 
                                                <p>{{$commentblog->comment}}</p>
                                            </div>
                                        </div>
                                @endforeach
                                @else
                                    <h4>Chưa có bình luận cho bài viết này !</h4>
                                @endif