<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\AdminRoleInterface;
    use App\Repositories\Eloquent\BaseRepository;
    

    class AdminRoleRepository extends BaseRepository implements AdminRoleInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\AdminRole::class;
        }
        
        // delete record where admin id
        public function DeleteAdminRole($admin_id)
        {
            $this->getModel()::where('admin_id', $admin_id)->delete();
        }

    }

?>