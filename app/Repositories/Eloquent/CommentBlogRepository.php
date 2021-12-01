<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CommentBlogInterface;
    use App\Repositories\Eloquent\BaseRepository;
    

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
            return $this->getModel()::where('blog_id',$id)->where('status',0)->get();
        }

    }

?>