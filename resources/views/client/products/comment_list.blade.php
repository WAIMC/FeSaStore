<div class="review border-default universal-padding">
                            @if($data_comment)
                             @foreach($data_comment as $comment)
                               <div class="row iconcustomer">
                                   <div class="col-2">
                                       <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:60%">
                                   </div>
                                   <div class="col-10">
                                   <h4 class="review-mini-title">{{$comment->cus->name}} <span class="time">{{ date('\V\à\o \l\ú\c H:i d-m-Y ',strtotime($comment->created_at))}}</span></h4> 
                                       <p>{{$comment->comment}}</p>
                                   </div>
                               </div>
                               @endforeach
                            @else
                                <p>Chưa có bình luận cho sản phẩm này!</p>
                            @endif