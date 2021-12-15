<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface CategoryInterface extends RepositoryInterface{

        public function showOption($lists, $parent_id = 0, $char = '');
        public function showMenuDesktop($menus, $parent_id = 0);
        public function showMenuMobile($menus, $parent_id = 0);
        public function showSearchCategory($menus, $parent_id = 0);
    }

?>