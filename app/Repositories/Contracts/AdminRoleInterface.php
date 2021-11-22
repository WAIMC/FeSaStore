<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface AdminRoleInterface extends RepositoryInterface{

        // delete record where admin id
        public function DeleteAdminRole($admin_id);
    }

?>