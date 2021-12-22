<?php

    namespace App\Repositories\Eloquent;

    use App\Repositories\Contracts\RatingInterface;
    use App\Repositories\Eloquent\BaseRepository;
    use DB;

    class RatingRepository extends BaseRepository implements RatingInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\ProductRating::class;
        }

        public function FindRating($id){
            return $this->getModel()::where('product_id',$id)->paginate(10);
        }

        public function FindRatingByProductId($id){
            return $this->getModel()::where('product_id',$id)->get();
        }

        public function GetListRating(){
            $data = $this->getModel()::join('product','product_rating.product_id','=','product.id')
            ->select(DB::raw('count(*) as soluong,product.name,product.image,product.id,
            MIN(product_rating.created_at) AS oldrating, MAX(product_rating.created_at) AS newrating'))
            ->groupByRaw('product.name,product.id,product.image')
            ->having('soluong','>',0)->paginate(10);
            return $data;
        }

        public function CountRating($id){
            $data= $this->getModel()::where('product_id',$id)->count();
            return $data;
        }

        public function AvgRating($id){
            $data= $this->getModel()::where('product_id',$id)->avg('star_rating');
            $avg_rating = round($data,2);
            return $avg_rating;
        }
    }

?>