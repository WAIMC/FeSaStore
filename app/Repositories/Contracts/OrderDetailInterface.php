<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface OrderDetailInterface extends RepositoryInterface{

        // filter chart by date 
        public function get_date_between($from_date, $to_date);
     
    }

?>