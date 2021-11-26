<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest as CategoryCreateCategoryRequest;
use App\Models\category;
use App\Repositories\Contracts\CategoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
    * @var SettingLinkInterface|\App\Repositories\Contracts
    */
    protected $category_repo;  
    
    public function __construct(CategoryInterface $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_cate = $this->category_repo->getAll();
        return view('dashboard.category.index', compact('data_cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $option = $this->category_repo->showOption($this->category_repo->getAll() ,0,'');
        return view('dashboard.category.create', compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $attributes = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ];
        $result = $this->category_repo->create($attributes);
        if($result){
            return redirect()->route('category.create')->with('success', 'Thêm mới danh mục thành công!');
        }else{
            return redirect()->route('category.create')->with('error', 'Thêm mới danh mục thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        dd($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $list_category = $this->category_repo->getAll();
        $option = $this->category_repo->showOption($this->category_repo->getAll() ,0,'');
        return view('dashboard.category.edit', compact('category', 'list_category', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, category $category)
    {
        $attributes = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ];
        $result = $this->category_repo->update($category, $attributes);
        if($result){
            return redirect()->route('category.edit', $category)->with('success', 'Cập nhập danh mục thành công!');
        }else{
            return redirect()->route('category.edit', $category)->with('error', 'Cập nhập danh mục thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        if($category->categoryChildren()->count() > 0)
            return redirect()->route('category.index')->with('error', 'Xóa Các Danh Mục Thuộc Danh Mục Này Trước!');
        else if($category->category_product->count() > 0)
            return redirect()->route('category.index')->with('error', 'Xóa Các Sản Phẩm Thuộc Danh Mục Này Trước!');
        else
            if($this->category_repo->destroy($category))
                return redirect()->route('category.index')->with('success', 'Xóa Danh Mục Thành Công!');
            else
                return redirect()->route('category.index')->with('error', 'Xóa Danh Mục Không Thành Công!');
    }
}
