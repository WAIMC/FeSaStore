<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\product;
use App\Repositories\Contracts\BrandInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\VariantProductInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    /**
    * @var SettingLinkInterface|\App\Repositories\Contracts
    */
    protected $product_repo;
    protected $variant_product_repo;
    protected $cate_repo;
    protected $brand_repo;  
    
    public function __construct(ProductInterface $product_repo, VariantProductInterface $variant_product_repo ,CategoryInterface $cate_repo, BrandInterface $brand_repo)
    {
        $this->product_repo = $product_repo;
        $this->variant_product_repo = $variant_product_repo;
        $this->cate_repo = $cate_repo;
        $this->brand_repo = $brand_repo;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pro = $this->product_repo->getAll();
        return view('dashboard.product.index', compact('data_pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_brand = $this->brand_repo->getAll();
        $list_cate = $this->cate_repo->showOption($this->cate_repo->getAll() ,0,'');
        return view('dashboard.product.create', compact('list_cate', 'list_brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $attributes_product = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        	'short_description' => $request->short_description,
        	'description' => $request->description,
        	'image' => $request->image,
        	'status' => $request->status,
        	'variant' => $request->variant,
        	'category_id' => $request->category_id,
        	'brand_id' => $request->brand_id
        ];

        $result = $this->product_repo->create($attributes_product);

        if($result){
            foreach ($request->variant_attribute as $key_vp => $value_vp) {
                $attributes_variant_product = [
                    'variant_attribute' => $request->variant_attribute[$key_vp],
                    'quantity' => $request->quantity[$key_vp],
                    'price' => $request->price[$key_vp],
                    'discount' => $request->discount[$key_vp],
                    'gallery' => $request->gallery[$key_vp],
                    'status' => $request->status,
                    'product_id' => $result->id
                ];
                $result_variant = $this->variant_product_repo->create($attributes_variant_product);
            }
        }

        if($result && $result_variant){
            return redirect()->route('product.index')->with('success', 'Thêm mới sản phẩm và biến thể thành công!');
        }else{
            return redirect()->route('product.create')->with('error', 'Thêm mới sản phẩm và biến thể thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $list_brand = $this->brand_repo->getAll();
        $options = $this->cate_repo->showOption($this->cate_repo->getAll() ,0,'');
        return view('dashboard.product.edit', compact('product', 'list_brand', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, product $product)
    {
        $attributes_product = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        	'short_description' => $request->short_description,
        	'description' => $request->description,
        	'image' => $request->image,
        	'status' => $request->status,
        	'variant' => $request->variant,
        	'category_id' => $request->category_id,
        	'brand_id' => $request->brand_id
        ];
        $result = $this->product_repo->update($product ,$attributes_product);

        if($result){
            if ($request->variant_attribute !== null) {
                foreach ($request->variant_attribute as $key_vp => $value_vp) {
                    $attributes_variant_product = [
                        'variant_attribute' => $request->variant_attribute[$key_vp],
                        'quantity' => $request->quantity[$key_vp],
                        'price' => $request->price[$key_vp],
                        'discount' => $request->discount[$key_vp],
                        'gallery' => $request->gallery[$key_vp],
                        'status' => $request->status,
                        'product_id' => $product->id
                    ];
                    $result_variant = $this->variant_product_repo->create($attributes_variant_product);
                }
            }
            
        }

        if(isset($result_variant)){
            if($result && $result_variant){
                return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm và biến thể thành công!');
            }
        }elseif ($result) {
            return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công!');
        }else{
            return redirect()->route('product.edit')->with('error', 'Thêm mới sản phẩm và biến thể thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if($product->product_variantProduct()->count() > 0)
            return redirect()->route('product.index')->with('error', 'Xóa Các Biến thể Thuộc Sản Phẩm Này Trước!');
        else
            if($this->product_repo->destroy($product))
                return redirect()->route('product.index')->with('access', 'Xóa Sản Phẩm Thành Công!');
            else
                return redirect()->route('product.index')->with('error', 'Xóa Sản Phẩm Không Thành Công!');

    }
}
