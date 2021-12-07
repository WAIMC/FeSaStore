<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Repositories\Contracts\CommentInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    public function __construct(CommentInterface $comment){
        $this->comment = $comment;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->comment->GetListComment();
        return view('dashboard.comment.index',compact('data'));
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
    public function store(CreateCommentRequest $request)
    {
        $attribute=[
            'comment'=>$request->comment,
            'product_id'=>$request->product_id,
            'customer_id'=>$request->customer_id
        ];

        if($this->comment->create($attribute)){
            $data_comment=$this->comment->FindComment($request->product_id);
            return view('client.products.comment_list',compact('data_comment'));
        }else{
            return redirect()->back()->with('error','Bình luận thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=$this->comment->FindComment($id);
        return view('dashboard.comment.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        return view('dashboard.comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        $attributes = [
            'parent_id' => $request->parent_id,
            'comment' => $request->comment,
            'status' => $request->status,
            'product_id' => $request->product_id,
            'customer_id' => $request->customer_id
        ];
        $result=$this->comment->update($comment, $attributes);
        if($result){
            return redirect()->route('comment.show',$comment->product_id)->with('success','Cập nhật thành công !');
        }else{
            return redirect()->route('comment.edit',$comment)->with('error','Cập nhật thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        $result=$this->comment->destroy($comment);
        if($result){
            return redirect()->route('comment.show',$comment->product_id)->with('success','Xóa bình luận thành công !');
        }else{
            return redirect()->route('comment.index',$comment)->with('error','Xóa bình luận thất bại !');
        }
    }
}
