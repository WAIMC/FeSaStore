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
        $data=$this->commentblog->GetListCommentBlog();
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
    public function show($id)
    {
        $data=$this->commentblog->FindCommentBlog($id);
        return view('dashboard.commentblog.detail',compact('data'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentBlog  $commentBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(commentblog $commentblog)
    {
        return view('dashboard.commentblog.edit',compact('commentblog'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommentBlog  $commentBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commentblog $commentblog)
    {
        $attributes = [
            'parent_id' => $request->parent_id,
            'comment' => $request->comment,
            'status' => $request->status,
            'blog_id' => $request->blog_id,
            'customer_id' => $request->customer_id
        ];
        $result=$this->commentblog->update($commentblog, $attributes);
        if($result){
            return redirect()->route('commentblog.show',$commentblog->blog_id)->with('success','Cập nhật thành công !');
        }else{
            return redirect()->route('commentblog.index',$commentblog)->with('error','Xóa thương hiệu thất bại !');
        }
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
            return redirect()->route('commentblog.show',$commentblog->blog_id)->with('success','Xóa thành công !');
        }else{
            return redirect()->route('commentblog.index',$commentblog)->with('error','Xóa thất bại !');
        }
    }
}
