<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\BlogInterface;
    use App\Repositories\Eloquent\BaseRepository;
    
    

    class BlogRepository extends BaseRepository implements BlogInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Blog::class;
        }
        

      

    }

?>