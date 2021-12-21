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
            return $this->getModel()::where('product_id',$id)->where('parent_id',0)->orderBy('id', 'desc')->paginate(10);
        }

        public function FindCommentClient($id){
            return $this->getModel()::where('product_id',$id)->where('parent_id',0)->where('status',0)->orderBy('id', 'desc')->paginate(10);
        }

        public function FindAnswerComment($id){
            return $this->getModel()::where('product_id',$id)->where('status',0)->orderBy('id', 'desc')->paginate(10);
        }

        public function FindCommentByProductId($id){
            return $this->getModel()::where('product_id',$id)->get();
        }

        public function CheckAnswerComment($product_id, $comment_id){
            
            $comment =  $this->getModel()::where('product_id',$product_id)->orderBy('id', 'desc')->get();
            $check = true;
                foreach($comment as $cm){
                    if($cm->parent_id == $comment_id){
                        $check = false;
                    }
                 }
            return $check;
        }

        public function GetAnswerComment($id){
            $comment =  $this->getModel()::where('parent_id',$id)->get();
            return $comment;
        }

        public function GetListComment(){
            $data = $this->getModel()::join('product','comment.product_id','=','product.id')
            ->select(DB::raw('count(*) as soluong,product.name,product.image,product.id,
            MIN(comment.created_at) AS oldcomment, MAX(comment.created_at) AS newcomment'))
            ->groupByRaw('product.name,product.id,product.image')
            ->having('soluong','>',0)->paginate(10);
            return $data;
        }    

    }

?>