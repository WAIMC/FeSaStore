<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface CategoryBlogInterface extends RepositoryInterface{
      public function getCategoryBlogActive();  
      
    }

?>