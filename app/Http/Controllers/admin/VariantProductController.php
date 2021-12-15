<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\VariantProduct\UpdateVariantProductRequest;
use App\Models\variantProduct;
use App\Repositories\Contracts\VariantProductInterface;

use Illuminate\Http\Request;

class VariantProductController extends Controller
{

    /**
    * @var SettingLinkInterface|\App\Repositories\Contracts
    */
    protected $variant_product_repo;
    
    public function __construct(VariantProductInterface $variant_product_repo)
    {
        $this->variant_product_repo = $variant_product_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_var = $this->variant_product_repo->getAll();
        return view('dashboard.variantProduct.index', compact('data_var'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\variantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */
    public function show(variantProduct $variantProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\variantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(variantProduct $variantProduct)
    {
        return view('dashboard.variantProduct.edit', compact('variantProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\variantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateVariantProductRequest $request, variantProduct $variantProduct)
    {
        $attributes = [
            'variant_attribute'=>$request->variant_attribute,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'gallery'=>$request->gallery,
            'status'=>$request->status,
            'product_id'=>$request->product_id

        ];
        if($this->variant_product_repo->update($variantProduct, $attributes)){
            return redirect()->route('variantProduct.index')->with('success', 'Cập nhật biến thể thành công!');
        }else{
            return redirect()->route('variantProduct.edit', compact('variantProduct'))->with('error', 'Cập nhật biến thể thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\variantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(variantProduct $variantProduct)
    {
        if($variantProduct->product_orderDetail->count() > 0){
            return redirect()->route('variantProduct.index')->with('error', 'Xóa đơn hàng chi tiết có biến thể này trước !');
        }else{
            if($this->variant_product_repo->destroy($variantProduct)){
                return redirect()->route('variantProduct.index')->with('success', 'Xóa biến thể thành công!');
            }else{
                return redirect()->route('variantProduct.index')->with('error', 'Xóa biến thể không thành công!');
            }
        }
    }
}
