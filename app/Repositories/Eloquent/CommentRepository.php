<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CommentInterface;
    use App\Repositories\Eloquent\BaseRepository;
    use DB;
    

    class CommentRepository extends BaseRepository implements CommentInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Comment::class;
        }

        public function FindComment($id){
            return $this->getModel()::where('product_id',$id)->paginate(10);
        }

        public function GetListComment(){
            $data = $this->getModel()::join('product','comment.product_id','=','product.id')
            ->select(DB::raw('count(*) as soluong,product.name,product.image,product.id,
            MIN(comment.created_at) AS oldcomment, MAX(comment.created_at) AS newcomment'))
            ->groupByRaw('product.name,product.id,product.image')
            ->having('soluong','>',0)->paginate(10);
            return $data;
        }
        
        public function showComment($menus, $parent_id = 0){
            $list_menu = '';
            foreach ($menus as $key_menu => $value_menu) {
                if($value_menu->parent_id == $parent_id){
                    if($value_menu->categoryChildren->count() > 0){
                        // co cau tra loi
                        // show ra binh luan
                        $list_menu .= `
                            <div class="row iconcustomer">
                                <div class="col-2">
                                    <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:60%">
                                </div>
                                <div class="col-10">
                                <h4 class="review-mini-title">{{$comment->cus->name}} <span class="time">20 phút trước</span></h4> 
                                    <p>{{$comment->comment}}</p>
                                </div>
                                // show ra cau tra loi
                                <div>
                                    cau tra loi
                                    nguoi tra loi : $value_menu->cus->name;
                                    noi dung cau tra loi : $value_menu->comment
                            
                        `;

                        $list_menu .= `                            
                                </div>
                                // dong the show ra cau tra loi
                            </div>
                        `;

                        $list_menu .= "<li class=''><a href=''><span><i class='fa fa-dot-circle-o' aria-hidden='true' style='position: unset'></i></span>".$value_menu->name."<i class='fa fa-angle-right' aria-hidden='true'></i></a>";
                        $list_menu .="<ul class='ht-dropdown mega-child'>";
                        unset($menus[$key_menu]);
                        $list_menu .= $this->showComment($menus, $value_menu->id);
                        $list_menu .= "</ul></li>";
                    }else{
                        // chi co comment ko co cau tra loi
                        $list_menu .= `
                            <div class="row iconcustomer">
                                <div class="col-2">
                                    <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:60%">
                                </div>
                                <div class="col-10">
                                <h4 class="review-mini-title">{{$comment->cus->name}} <span class="time">20 phút trước</span></h4> 
                                    <p>{{$comment->comment}}</p>
                                </div>
                            </div>
                        `;
                        $list_menu .= "<li class=''><a href='".route('client.shop',['searchCategory'=>$value_menu->id])."'><span><i class='fa fa-dot-circle-o' aria-hidden='true' style='position: unset'></i></span>".$value_menu->name."</a></li>";
                        unset($menus[$key_menu]);
                    }
                   
                }
            }
            return $list_menu;
        }        

    }

?>