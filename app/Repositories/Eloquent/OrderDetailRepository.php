<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\OrderDetailInterface;
    use App\Repositories\Eloquent\BaseRepository;

    class OrderDetailRepository extends BaseRepository implements OrderDetailInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\OrderDetail::class;
        }
  

    }

?>