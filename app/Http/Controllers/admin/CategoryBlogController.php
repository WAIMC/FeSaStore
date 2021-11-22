<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use App\Http\Requests\CategoryBlog\CreateCategoryBlogRequest;
use App\Http\Requests\CategoryBlog\UpdateCategoryBlogRequest;
use App\Repositories\Contracts\CategoryBlogInterface;
use Illuminate\Support\Str;
class CategoryBlogController extends Controller
{

   protected $categoryblog;
    public function __construct(CategoryBlogInterface $categoryblog)
    {
        $this->categoryblog=$categoryblog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->categoryblog->paginate(10);
        return view('dashboard.categoryblog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categoryblog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryBlogRequest $request)
    {
       $attribute=[
           'name'=>$request->name,
           'description'=>$request->description,
           'slug' => Str::slug($request->name),
       ];
        if($this->categoryblog->create($attribute)){
            return redirect()->route('categoryblog.index')->with('success','Thêm mới thành công!');
        }else{
            return redirect()->back()->with('error','Thêm mới thất bại!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryBlog $categoryBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBlog $categoryblog)
    {
        return view('dashboard.categoryblog.edit',compact('categoryblog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryBlogRequest $request, CategoryBlog $categoryblog)
    {
        $attribute=[
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'slug' => Str::slug($request->name),
        ];
        if($this->categoryblog->update($categoryblog,$attribute)){
            return redirect()->route('categoryblog.edit',$categoryblog)->with('success','Cập nhật thành công!');
        }else{
            return redirect()->route('categoryblog.edit',$categoryblog)->with('error','Cập nhật thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryBlog $categoryblog)
    {
        if(count($categoryblog->getblog)>0 ){
            return redirect()->route('categoryblog.index')->with('error','Xóa thất bại!');
        }else{
            $this->categoryblog->destroy($categoryblog);
            return redirect()->route('categoryblog.index')->with('success','Xóa thành công!');
           
        }
    }
}
