<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface CommentInterface extends RepositoryInterface{

        public function FindComment($id);
    }

?>