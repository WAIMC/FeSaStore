<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\BrandInterface;
    use App\Repositories\Eloquent\BaseRepository;

    class BrandRepository extends BaseRepository implements BrandInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Brand::class;
        }
  

    }

?>