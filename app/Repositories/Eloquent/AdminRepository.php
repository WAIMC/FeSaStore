<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\AdminInterface;
    use App\Repositories\Eloquent\BaseRepository;
    

    class AdminRepository extends BaseRepository implements AdminInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Admin::class;
        }
        


    }

?>