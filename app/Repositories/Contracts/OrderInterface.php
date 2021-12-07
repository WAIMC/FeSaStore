<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface OrderInterface extends RepositoryInterface{

     public function showOrderDetail($id);
     public function updateStatus($order);
     public function showCustomerOrder($id);
    }

?>