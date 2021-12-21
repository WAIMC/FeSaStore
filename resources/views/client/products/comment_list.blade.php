@if($data_comment && $data_comment->count() > 0)
                                    @foreach($data_comment as $comment)
                                        <div class="row iconcustomer">
                                            <div class="col-1">
                                                <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:130%">
                                            </div>
                                            <div class="col-11">
                                                <p class="review-mini-title-comment">{{$comment->cus->name}} <span class="time"> bình luận vào lúc {{ date('H:i d-m-Y ',strtotime($comment->created_at))}}</span></p> 
                                                <p>{{$comment->comment}}</p>
                                                 <!--Phần trả lời comment -->
                                                    @if($data_answer_comment != null)
                                                            @foreach($data_answer_comment as $answer_comment)
                                                                @if($answer_comment->parent_id == $comment->id)
                                                            
                                                                    <div class="col-10">
                                                                    <p class="answer-comment">{{$answer_comment->comment}} - <i> được trả lời bởi {{$answer_comment->cus->name}} vào lúc <span class="time">{{ date('\V\à\o \l\ú\c H:i d-m-Y ',strtotime($answer_comment->created_at))}}</span></i> </p>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                    @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>Chưa có bình luận cho sản phẩm này!</h4>
                                @endif