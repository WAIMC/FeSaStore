<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CustomerInterface;
    use App\Repositories\Eloquent\BaseRepository;
    

    class CustomerRepository extends BaseRepository implements CustomerInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Customer::class;
        }
        


    }

?>