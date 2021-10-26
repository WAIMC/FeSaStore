<?php

    namespace App\Repositories\Eloquent;


    use App\Repositories\Contracts\VariantProductInterface;
    use App\Repositories\Eloquent\BaseRepository;
    
    

    class VariantProductRepository extends BaseRepository implements VariantProductInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\VariantProduct::class;
        }

    }

?>