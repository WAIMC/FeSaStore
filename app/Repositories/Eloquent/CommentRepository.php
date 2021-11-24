<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CommentInterface;
    use App\Repositories\Eloquent\BaseRepository;
    

    class CommentRepository extends BaseRepository implements CommentInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Comment::class;
        }
        


    }

?>