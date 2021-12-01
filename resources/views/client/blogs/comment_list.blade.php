@if($data_commentblog)
      @foreach($data_commentblog as $commentblog)
                                <div class="row iconcustomer">
                                    <div class="col-2">
                                        <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:60%">
                                    </div>
                                    <div class="col-10">
                                    <h4 class="review-mini-title">{{$commentblog->cus->name}} <span class="time">{{ date('\V\à\o \l\ú\c H:i d-m-Y ',strtotime($commentblog->created_at))}}</span></h4> 
                                        <p>{{$commentblog->comment}}</p>
                                    </div>

                                </div>
                                @endforeach
                                @else
                                    <p>Chưa có bình luận cho sản phẩm này !</p>
                                @endif