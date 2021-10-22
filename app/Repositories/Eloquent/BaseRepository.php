<?php

    namespace App\Repositories\Eloquent;
    

    use App\Repositories\Exceptions\RepositoryException;
    use App\Repositories\Contracts\RepositoryInterface;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Container\Container as App;


    abstract class BaseRepository implements RepositoryInterface{

        /**

         * @var App
         */
        private $app;

        /**
        *   @var \Illuminate\Database\Eloquent\Model

        */
        protected $model;

        /**

         * @param App $app
         * @throws \App\Repositories\Exceptions\RepositoryException
         */
        public function __construct(App $app)
        {
            $this->app = $app;

            $this->setModel();
        }
    
        /**
        *   get model connect

        *   @return string

        */
        abstract public function getModel();
    
        /**
        *   Set model
        *   @return model

        *   @throws RepositoryException
        */
        public function setModel()
        {
            // first : $this->model = app()->make($this->getModel());
            // true : $model = app()->make($this->getModel());
            $model = $this->app->make($this->getModel());
            if(!$model instanceof Model)
                throw new RepositoryException("Class {$this->getModel()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
            return $this->model = $model->newQuery();
            

        }
        
        /**
        *   get all record

        *   @return \Illuminate\Database\Eloquent\Collection|static[]
        */ 
        public function getAll()
        {
          return   $this->model->orderBy('created_at', 'DESC')->get();

        }
    
        /**
        *   find a record

        *   @param $id

        *   @return mixed
        */ 
        public function find($id)
        {
            $result = $this->model->find($id);
    
            return $result;
        }

        public function findBySlug($slug)
        {
            return $this->model->where('slug', $slug)->first();
        }

        public function paginate($perPage = 15)
        {
            return $this->model->orderBy('created_at', 'DESC')->paginate($perPage);
        }
    
        /**
        *   create record

        *   @param array $attributes

        *   @return mixed
        */ 
        public function create($attributes = [])
        {
            return $this->model->create($attributes);
        }
    
        /**
        *   update record

        * @param $id
        * @param array $attributes
        * @return bool|mixed

        */ 
        public function update($model, $attributes = [])
        {
            $model->update($attributes);
            
            return  $model;
        }
    
        /**
        *   delete record

        * @param $id
        * @return bool

        */ 
        public function destroy($model)
        {
            return $model->delete();
        }

    }
?>