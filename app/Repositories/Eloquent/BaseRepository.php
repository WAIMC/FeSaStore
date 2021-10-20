<?php

    namespace App\Repositories\Eloquent;
    
    use App\Repositories\Contracts\RepositoryInterface;

    abstract class BaseRepository implements RepositoryInterface{

        /**
        *   choose model connect
        */
        protected $model;

        /**
        *   init 
        */
        public function __construct()
        {
            $this->setModel();
        }
    
        /**
        *   get model connect
        */
        abstract public function getModel();
    
        /**
        *   Set model
        *   @return model
        */
        public function setModel()
        {
            $this->model = app()->make(
                $this->getModel()
            );
        }
        
        /**
        *   get all record
        *   @return mixed
        */ 
        public function getAll()
        {
            return $this->model->all();
        }
    
        /**
        *   find a record
        *   @param available
        *   @return mixed
        */ 
        public function find($id)
        {
            $result = $this->model->find($id);
    
            return $result;
        }
    
        /**
        *   create record
        *   @param array
        *   @return mixed
        */ 
        public function create($attributes = [])
        {
            return $this->model->create($attributes);
        }
    
        /**
        *   update record
        *   @param available
        *   @param array
        *   @return mixed
        */ 
        public function update($id, $attributes = [])
        {
            $result = $this->find($id);
            if ($result) {
                $result->update($attributes);
                return $result;
            }
    
            return false;
        }
    
        /**
        *   delete record
        *   @param available
        *   @return mixed
        */ 
        public function delete($id)
        {
            $result = $this->find($id);
            if ($result) {
                $result->delete();
    
                return true;
            }
    
            return false;
        }

    }
?>