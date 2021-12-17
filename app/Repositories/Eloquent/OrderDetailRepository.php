<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\OrderDetailInterface;
    use App\Repositories\Eloquent\BaseRepository;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;

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
            return $this->getModel()::whereDate('created_at', '>=', $from_date)
                                    ->whereDate('created_at', '<=', $to_date)
                                    ->groupBy('created_at')
                                    ->select(
                                        DB::raw('sum(quantity) as quantity'),
                                        DB::raw('sum(quantity * price) as sales'),
                                        DB::raw('(sum(quantity * price) * 0.3) as profit'),
                                        DB::raw('created_at as date')
                                        )
                                    ->orderBy('created_at', 'ASC')
                                    ->get();
        }

    }

?>