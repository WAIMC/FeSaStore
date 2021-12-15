<?php

    namespace App\Repositories\Eloquent;

use App\Models\VariantProduct;
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
            if(isset($request->search_name)){
                $softType = 'name';
                $softBy = $request->search_name;
            }elseif(isset($request->created_at)){
                $softType = 'created_at';
                $softBy = $request->created_at;
            }else{
                $softType = 'created_at';
                $softBy = 'DESC';
            }
            // check price and paginate to filter
            $min_price =  isset($request->start_price) ? $request->start_price : VariantProduct::min('price');
            $max_price = isset($request->end_price) ? $request->end_price : VariantProduct::max('price');
            $paginate = isset($request->paginate) ? $request->paginate : 12;

            $model_search = $this->getModel()::orderBy($softType, $softBy)
                                        ->SearchCategory()
                                        ->SearchBrand()
                                        // ->product_variantProduct()
                                        // ->first()
                                        // ->whereBetween('price', [$min_price, $max_price])
                                        ->paginate($paginate);
            
            return $model_search;
        }

    }

?>