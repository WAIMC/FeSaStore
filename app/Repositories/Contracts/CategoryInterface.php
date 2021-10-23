<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface CategoryInterface extends RepositoryInterface{

        public function showOption($lists, $parent_id = 0, $char = '');
    }

?>