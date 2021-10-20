<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\SettingLinkInterface;
    use App\Repositories\Eloquent\BaseRepository;
    

    class SettingLinkRepository extends BaseRepository implements SettingLinkInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\settingLink::class;
        }
        


    }

?>