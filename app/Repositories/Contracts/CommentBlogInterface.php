<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface CommentBlogInterface extends RepositoryInterface{

        public function FindCommentBlog($id);

        public function FindCommentBlogById($id);

        public function GetListCommentBlog();
    }

?>