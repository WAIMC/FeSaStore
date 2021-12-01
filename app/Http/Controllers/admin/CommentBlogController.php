<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CommentBlog;
use App\Http\Requests\CommentBlog\CreateCommentBlogRequest;
use App\Repositories\Contracts\CommentBlogInterface;
use Illuminate\Http\Request;

class CommentBlogController extends Controller
{
    protected $commentblog;
    public function __construct(CommentBlogInterface $commentblog){
        $this->commentblog = $commentblog;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->commentblog->paginate(10);
        return view('dashboard.commentblog.index',compact('data'));
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
     * Display the specified resource.
     *
     * @param  \App\Models\CommentBlog  $commentBlog
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentBlogRequest $request)
    {
        $attribute=[
            'comment'=>$request->comment,
            'blog_id'=>$request->blog_id,
            'customer_id'=>$request->customer_id
        ];
        if($this->commentblog->create($attribute)){
            $data_commentblog=$this->commentblog->FindCommentBlog($request->blog_id);
            return view('client.blogs.comment_list',compact('data_commentblog'));
        }else{
            return redirect()->back()->with('error','Bình luận thất bại!');
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentBlog  $commentBlog
     * @return \Illuminate\Http\Response
     */
    public function show(commentblog $commentblog)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentBlog  $commentBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(commentblog $commentblog)
    {
        //
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommentBlog  $commentBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commentblog $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commentblog  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(commentblog $commentblog)
    {
        $result=$this->commentblog->destroy($commentblog);
        if($result){
            return redirect()->route('commentblog.index')->with('success','Xóa thương hiệu thành công !');
        }else{
            return redirect()->route('commentblog.index',$commentblog)->with('error','Xóa thương hiệu thất bại !');
        }
    }
}
