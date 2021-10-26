<?php

    namespace App\Repositories\Eloquent;


    use App\Repositories\Contracts\ProductInterface;
    use App\Repositories\Eloquent\BaseRepository;
    
    

    class ProductRepository extends BaseRepository implements ProductInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Product::class;
        }

    }

?>