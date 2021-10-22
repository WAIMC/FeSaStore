<?php

    namespace App\Repositories\Contracts;

    interface RepositoryInterface{

        /**
         * Get all
         * @return mixed
         */
        public function getAll();

        /**
         * Get one
         * @param $id
         * @return mixed
         */
        public function find($id);

        /**
         * Create
         * @param array $attributes
         * @return mixed
         */
        public function create($attributes = []);

        /**
         * Update
         * @param $id
         * @param array $attributes
         * @return mixed
         */
        public function update($model, $attributes = []);

        /**
         * Delete
         * @param $id
         * @return mixed
         */
        public function destroy($model);
        public function paginate($perPage = 15);
        public function findBySlug($slug);
    }
?>