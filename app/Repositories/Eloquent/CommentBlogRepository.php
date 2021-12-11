<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CommentBlogInterface;
    use App\Repositories\Eloquent\BaseRepository;
    use DB;

    class CommentBlogRepository extends BaseRepository implements CommentBlogInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\CommentBlog::class;
        }
        

        public function FindCommentBlog($id){
            return $this->getModel()::where('blog_id',$id)->orderBy('id', 'desc')->paginate(10);
        }

        public function GetListCommentBlog(){
            $data = $this->getModel()::join('blog','comment_blog.blog_id','=','blog.id')
            ->select(DB::raw('count(*) as soluong,blog.title,blog.image,blog.id,
            MIN(comment_blog.created_at) AS oldcommentblog, MAX(comment_blog.created_at) AS newcommentblog'))
            ->groupByRaw('blog.title,blog.id,blog.image')
            ->having('soluong','>',0)->paginate(10);
            return $data;
        }

    }

?>