<?php

    namespace App\Repositories\Eloquent;


    use App\Repositories\Contracts\ProductInterface;
    use App\Repositories\Eloquent\BaseRepository;
    
    

    class ProductRepository extends BaseRepository implements ProductInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Product::class;
        }

        public function searchProduct($request)
        {
            // check type and soft by date to filter
            if(isset($request->price)){
                $softType = 'price';
                $softBy = $request->price; 
            }elseif(isset($request->name)){
                $softType = 'name';
                $softBy = $request->name;
            }elseif(isset($request->created_at)){
                $softType = 'created_at';
                $softBy = $request->created_at;
            }else{
                $softType = 'created_at';
                $softBy = 'DESC';
            }
            // check price and paginate to filter
            // $min_price =  isset($request->min_price) ? $request->min_price : $this->getModel()->product_variantProduct()->first()->min('price');
            // $max_price = isset($request->max_price) ? $request->max_price : $this->getModel()->product_variantProduct()->first()->max('price');
            $paginate = isset($request->paginate) ? $request->paginate : 12;

            return $this->getModel()::orderBy($softType, $softBy)
                                        ->SearchCategory()
                                        // ->product_variantProduct()
                                        // ->first()
                                        // ->whereBetween('price', [$min_price, $max_price])
                                        ->paginate($paginate);
        }

    }

?>