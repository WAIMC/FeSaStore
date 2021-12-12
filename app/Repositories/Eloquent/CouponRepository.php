<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CouponInterface;
    use App\Repositories\Eloquent\BaseRepository;

    class CouponRepository extends BaseRepository implements CouponInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Coupon::class;
        }
  

    }

?>