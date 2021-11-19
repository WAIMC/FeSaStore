<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface ProductInterface extends RepositoryInterface{

        public function searchProduct($request);
    }

?>