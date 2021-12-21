<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface CommentInterface extends RepositoryInterface{

        public function FindComment($id);
        
        public function FindCommentClient($id);

        public function FindAnswerComment($id);

        public function CheckAnswerComment($product_id, $comment_id);

        public function FindCommentByProductId($id);

        public function GetAnswerComment($id);

        public function GetListComment();
    }

?>