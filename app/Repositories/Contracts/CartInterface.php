<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface CartInterface extends RepositoryInterface{
        public function checkout($name,$email,$phone,$address,$note,$customer_id);
        
        public function vnpayCheckout();
    }

?>