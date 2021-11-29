<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\SliderInterface;
    use App\Repositories\Eloquent\BaseRepository;

    class SliderRepository extends BaseRepository implements SliderInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Slider::class;
        }
  

    }

?>