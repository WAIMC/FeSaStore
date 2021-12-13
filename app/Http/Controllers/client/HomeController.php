<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BannerInterface;
use App\Repositories\Contracts\BrandInterface;
use App\Repositories\Contracts\SettingLinkInterface;
use App\Repositories\Contracts\CategoryBlogInterface;
use App\Repositories\Contracts\BlogInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\CommentInterface;
use App\Repositories\Contracts\CommentBlogInterface;
use App\Repositories\Contracts\SliderInterface;
use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Contracts\RatingInterface;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
    * @var Interface|\App\Repositories\Contracts
    */
    protected $category_repo;
    protected $product_repo;
    protected $brand_repo;
    protected $banner_repo;
    protected $setting_link_repo;
    protected $categoryblog;
    protected $blogs;
    protected $comment;
    protected $commentblog;
    protected $slider_repo;
    protected $order_repo;
    protected $rating_repo;
    
    public function __construct(
        CategoryInterface $category_repo,
        ProductInterface $product_repo,
        CategoryBlogInterface $categoryblog,
        BlogInterface $blogs,
        BrandInterface $brand_repo, 
        BannerInterface $banner_repo, 
        SettingLinkInterface $setting_link_repo,
        CommentInterface $comment,
        CommentBlogInterface $commentblog,
        SliderInterface $slider_repo,
        OrderInterface $order_repo,
        RatingInterface $rating_repo
    ){
        $this->category_repo = $category_repo;
        $this->product_repo = $product_repo;
        $this->brand_repo = $brand_repo;
        $this->banner_repo = $banner_repo;
        $this->setting_link_repo = $setting_link_repo;
        $this->categoryblog=$categoryblog;
        $this->blogs=$blogs;
        $this->comment=$comment;
        $this->commentblog = $commentblog;
        $this->slider_repo = $slider_repo;
        $this->order_repo = $order_repo;
        $this->rating_repo = $rating_repo;
    }

    /**
     * return index
     *   
     */ 
    public function index(Request $request){
        //--seo
        // $meta_desc = "chuyên bán quần áo ";
        // $meta_keywords = "quần áo,phụ kiện thời trang";
        // $meta_title = "thời trang nam,thời trang nữ";
        // $url_canonical = $request->url();
        //seo
        $all_brand = $this->brand_repo->getAll();
        $all_banner = $this->banner_repo->getAll();
        $all_slider = $this->slider_repo->getAll();
        $all_setting_link = $this->setting_link_repo->getAll();
        $all_order = $this->order_repo->getAll();
        $get_category_children = []; 
        // get category children haven't children
        foreach ($this->category_repo->getAll() as $cat) {
            if($cat->categoryChildren()->count() == 0){
                array_push($get_category_children, $cat);
            }
        }
        $paginate_cate = array_slice($get_category_children, 0, 5, true);
        return view('client.index',
                    compact(
                        'all_brand', 
                        'all_banner',
                        'all_slider', 
                        'all_setting_link', 
                        'paginate_cate',
                        'all_order',
                        // 'meta_desc',
                        // 'meta_keywords',
                        // 'meta_title',
                        // 'url_canonical'
                        )
                    );
    }

    public function about(){
        
        return view('client.pages.about');
    }

    public function contact(){
        
        return view('client.pages.contact');
    }

    public function shop(Request $request){
        // (product)->(has:category)->(has:variant)->(price or date)->(between price)->paginate(12)
        $top_5_new = $this->product_repo->paginate(5);
        $data_paginate_product = $this->product_repo->searchProduct($request);
        return view('client.products.shop', compact('data_paginate_product', 'top_5_new'));
    }

    public function productDetail($slug){
        $data_product_detail = $this->product_repo->findBySlug($slug);
        // dd($data_product_detail);
        $data_comment = $this->comment->FindComment($data_product_detail->id);
        $data_rating = $this->rating_repo->FindRating($data_product_detail->id);
        $avg_rating = $this->rating_repo->AvgRating($data_product_detail->id);
        $number_rating = $this->rating_repo->CountRating($data_product_detail->id);
        
        return view('client.products.productDetail', compact('data_product_detail','data_comment','avg_rating','number_rating','data_rating'));
    }
    public function blog(){
        $blogs=$this->blogs->paginate(10);
        return view('client.blogs.blog', compact('blogs'));
    }
    public function blog_details($slug){
        $blog=$this->blogs->findBySlug($slug);
        $data_commentblog = $this->commentblog->FindCommentBlog($blog->id);
      
        return view('client.blogs.blog_details', compact('blog','data_commentblog'));
    }
    
    public function categoryblog($slug){
        $blogs=$this->categoryblog->findBySlug($slug);
        return view('client.blogs.blog', compact('blogs'));
    }

    public function post_contact(Request $request){

        Mail::send('email.contact',[
            'name' => $request->name,
            'content' => $request->content,
        ],function($mail) use($request){
            $mail->to('fesastorefpoly@gmail.com',$request->name);
            $mail->from($request->email);
            $mail->subject('Thư góp ý của khách hàng FesaStore');
        }) ;

        return view('client.pages.contact');
    }

    public function post_comment_product(Request $request){
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

    public function post_rating(Request $request){
        $attribute=[
            'star_rating'=>$request->star_rating,
            'product_id'=>$request->product_id,
            'customer_id'=>$request->customer_id
        ];

        if($this->rating_repo->create($attribute)){
            $data_rating=$this->rating_repo->FindRating($request->product_id);
            $avg_rating = $this->rating_repo->AvgRating($request->product_id);
            $number_rating = $this->rating_repo->CountRating($request->product_id);
            $product_id = $request->product_id;

            return view('client.products.avg_rating',compact('number_rating','avg_rating','product_id','data_rating'));
        }else{
            return redirect()->back()->with('error','Bình luận thất bại!');
        }
    }

    public function post_comment_blog(Request $request){
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

    
 

}
