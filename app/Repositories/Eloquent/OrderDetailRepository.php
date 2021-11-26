<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\OrderDetailInterface;
    use App\Repositories\Eloquent\BaseRepository;
    use Carbon\Carbon;

    class OrderDetailRepository extends BaseRepository implements OrderDetailInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\OrderDetail::class;
        }
  
        /**
         * get date between from date to date
         * @return array
         */
        public function get_date_between($from_date, $to_date){
            return $this->getModel()::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->get();
        }

    }

?>