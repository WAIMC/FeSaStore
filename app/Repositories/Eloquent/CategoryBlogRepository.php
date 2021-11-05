<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CategoryBlogInterface;
    use App\Repositories\Eloquent\BaseRepository;
    
    

    class CategoryBlogRepository extends BaseRepository implements CategoryBlogInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\CategoryBlog::class;
        }
   
       public  function getCategoryBlogActive(){
           return $this->getModel()::where('status', 0)->orderBy('name', 'ASC')->get();
        }
        
     }

?>