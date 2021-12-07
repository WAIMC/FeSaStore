<?php

    namespace App\Repositories\Contracts;

    use App\Repositories\Contracts\RepositoryInterface;

    interface RatingInterface extends RepositoryInterface{

        public function FindRating($id);

        public function GetListRating();

        public function CountRating($id);

        public function AvgRating($id);
    }

?>