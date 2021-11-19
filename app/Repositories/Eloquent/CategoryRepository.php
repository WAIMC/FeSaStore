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

        /**
        *   show list menu parent and children for desktop
        *   @return string
        */ 
        public function showMenuDesktop($menus, $parent_id = 0){
            $list_menu = '';
            foreach ($menus as $key_menu => $value_menu) {
                if($value_menu->parent_id == $parent_id){
                    if($value_menu->categoryChildren->count() > 0){
                        $list_menu .= "<li class=''><a href=''><span><i class='fa fa-dot-circle-o' aria-hidden='true' style='position: unset'></i></span>".$value_menu->name."<i class='fa fa-angle-right' aria-hidden='true'></i></a>";
                        $list_menu .="<ul class='ht-dropdown mega-child'>";
                        unset($menus[$key_menu]);
                        $list_menu .= $this->showMenuDesktop($menus, $value_menu->id);
                        $list_menu .= "</ul></li>";
                    }else{
                        $list_menu .= "<li class=''><a href='".route('client.shop',['searchCategory'=>$value_menu->id])."'><span><i class='fa fa-dot-circle-o' aria-hidden='true' style='position: unset'></i></span>".$value_menu->name."</a></li>";
                        unset($menus[$key_menu]);
                    }
                   
                }
            }
            return $list_menu;
        }        

        /**
        *   show list menu parent and children for mobile
        *   @return string
        */ 
        public function showMenuMobile($menus, $parent_id = 0){
            $list_menu_mobile = '';
            foreach ($menus as $key_menu => $value_menu) {
                if($value_menu->parent_id == $parent_id){
                    if($value_menu->categoryChildren->count() > 0){
                        $list_menu_mobile .= "<li class='has-sub'><a href=''>".$value_menu->name."</a>";
                        $list_menu_mobile .="<ul class='category-sub'>";
                        unset($menus[$key_menu]);
                        $list_menu_mobile .= $this->showMenuMobile($menus, $value_menu->id);
                        $list_menu_mobile .= "</ul></li>";
                    }else{
                        $list_menu_mobile .= "<li class=''><a href='".route('client.shop',['searchCategory'=>$value_menu->id])."'>".$value_menu->name."</a></li>";
                        unset($menus[$key_menu]);
                    }
                   
                }
            }
            return $list_menu_mobile;
        }        

    }

?>