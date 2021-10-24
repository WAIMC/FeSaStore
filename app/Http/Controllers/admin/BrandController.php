<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Repositories\Contracts\BrandInterface;
use Illuminate\Support\Str;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $brands;
    public function __construct(BrandInterface $brands)
    {
        $this->brands=$brands;
    }
    public function index()
    {
        $data=$this->brands->paginate(10);
       return view('dashboard.brand.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {
        $attributes = [
            'name' => $request->name,
            'logo' => $request->image,
            'slug' => Str::slug($request->name),        
        ];
        $result=$this->brands->create($attributes);
        if($result){
            return redirect()->route('brand.index')->with('success','Tạo thương hiệu thành công !');
        }else{
            return redirect()->route('brand.create')->with('error','Tạo thương hiệu thất bại !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $attributes = [
            'name' => $request->name,
            'logo' => $request->image,
            'slug' => Str::slug($request->name),        
        ];
        $result=$this->brands->update($brand, $attributes);
        if($result){
            return redirect()->route('brand.index')->with('success','Cập nhật thương hiệu thành công !');
        }else{
            return redirect()->route('brand.edit',$brand)->with('error','Cập nhật thương hiệu thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $result=$this->brands->destroy($brand);
        if($result){
            return redirect()->route('brand.index')->with('success','Xóa thương hiệu thành công !');
        }else{
            return redirect()->route('brand.index',$brand)->with('error','Xóa thương hiệu thất bại !');
        }
    }
}
