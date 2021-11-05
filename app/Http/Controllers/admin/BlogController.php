<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Repositories\Contracts\BlogInterface;
use App\Repositories\Contracts\CategoryBlogInterface;
use Illuminate\Support\Str;
class BlogController extends Controller
{

    protected $blogs;
    protected $categoryblog;
    public function __construct(BlogInterface $blogs,CategoryBlogInterface $categoryblog)
    {
        $this->blogs=$blogs;
        $this->categoryblog=$categoryblog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->blogs->paginate(10);
        return view('dashboard.blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelcategoryblog=$this->categoryblog->getCategoryBlogActive();
        return view('dashboard.blog.create',compact('modelcategoryblog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        $attribute=[
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$request->image,
            'author'=>$request->author,
            'category_blog_id'=>$request->category_blog_id,
            'slug' => Str::slug($request->title),
        ];
        if($this->blogs->create($attribute)){
            return redirect()->route('blog.index')->with('success','Thêm mới thành công!');
        }else{
            return redirect()->back()->with('error','Thêm mới thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $modelcategoryblog=$this->categoryblog->getCategoryBlogActive();
        return view('dashboard.blog.edit',compact('blog','modelcategoryblog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $attribute=[
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$request->image,
            'author'=>$request->author,
            'category_blog_id'=>$request->category_blog_id,
            'slug' => Str::slug($request->title),
        ];
        if($this->blogs->update($blog,$attribute)){
            return redirect()->route('blog.edit',$blog)->with('success','Cập nhật thành công!');
        }else{
            return redirect()->back()->with('error','Cập nhật thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($this->blogs->destroy($blog)){
            return redirect()->route('blog.index')->with('success','Xóa dữ liệu thành công!');
        }else{
            return redirect()->route('blog.index')->with('error','Xóa dữ liệu thất bại!');
        }
    }
}
