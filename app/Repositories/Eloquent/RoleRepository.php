<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\RoleInterface;
    use App\Repositories\Eloquent\BaseRepository;
    

    class RoleRepository extends BaseRepository implements RoleInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Role::class;
        }
        


    }

?>