<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\CategoryInterface;
    use App\Repositories\Eloquent\BaseRepository;
    
    

    class CategoryRepository extends BaseRepository implements CategoryInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Category::class;
        }
        
        /**
        *   show list option parent and children 
        *   @return string
        */ 
        public function showOption($lists, $parent_id = 0, $char = ''){
            $option = '';
            // $lists = $this->model->get();
            foreach ($lists as $key => $list) {
                if($list->parent_id == $parent_id){
                    $option .= "<option value='".$list->id."' >" . $char . " " . $list->name . "</option>";
                    unset($lists[$key]);
                    $option .= $this->showOption($lists, $list->id, $char . '|--');
                }
            }
            return $option;
        }

    }

?>