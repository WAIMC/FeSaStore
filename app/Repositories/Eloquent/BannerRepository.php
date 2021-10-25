<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\BannerInterface;
    use App\Repositories\Eloquent\BaseRepository;

    class BannerRepository extends BaseRepository implements BannerInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Banner::class;
        }
  

    }

?>