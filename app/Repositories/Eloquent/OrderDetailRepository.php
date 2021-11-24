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
  
        /**
         * get date between from date to date
         * @return array
         */
        public function get_date_between($from_date, $to_date){
            return $this->getModel()::WhereBetween('created_at',[$from_date,$to_date])->getAll();
        }

    }

?>