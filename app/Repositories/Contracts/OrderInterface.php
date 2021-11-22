<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface OrderInterface extends RepositoryInterface{
        public function checkout($name,$email,$phone,$address,$note,$customer_id);
     
    }

?>