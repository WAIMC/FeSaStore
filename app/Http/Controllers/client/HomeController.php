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
    
    public function __construct(
        CategoryInterface $category_repo,
        ProductInterface $product_repo,
        CategoryBlogInterface $categoryblog,
        BlogInterface $blogs,
        BrandInterface $brand_repo, 
        BannerInterface $banner_repo, 
        SettingLinkInterface $setting_link_repo
    )
    {
        $this->category_repo = $category_repo;
        $this->product_repo = $product_repo;
        $this->brand_repo = $brand_repo;
        $this->banner_repo = $banner_repo;
        $this->setting_link_repo = $setting_link_repo;
        $this->categoryblog=$categoryblog;
        $this->blogs=$blogs;
    }

    /**
     * return index
     *   
     */ 
    public function index(){
        $all_brand = $this->brand_repo->getAll();
        $all_banner = $this->banner_repo->getAll();
        $all_setting_link = $this->setting_link_repo->getAll();

        $get_category_children = []; 
        // get category children haven't children
        foreach ($this->category_repo->getAll() as $cat) {
            if($cat->categoryChildren()->count() == 0){
                array_push($get_category_children, $cat);
            }
        }
        $paginate_cate = array_slice($get_category_children, 0, 5, true);

        return view('client.index', compact('all_brand', 'all_banner', 'all_setting_link', 'paginate_cate'));
    }

    public function about(){
        
        return view('client.pages.about');
    }

    public function contact(){
        
        return view('client.pages.contact');
    }

    public function shop(Request $request){
        // (product)->(has:category)->(has:variant)->(price or date)->(between price)->paginate(12)
        $data_paginate_product = $this->product_repo->searchProduct($request);
        return view('client.products.shop', compact('data_paginate_product'));
    }

    public function productDetail($product_id){
        $data_product_detail = $this->product_repo->find($product_id);
        return view('client.products.productDetail', compact('data_product_detail'));
    }

    public function register(){
        
        return view('client.register');
    }

    public function signIn(){
        
        return view('client.signIn');
    }

    public function forgotPassword(){
        
        return view('client.forgotPassword');
    }

    
    public function checkout(){
        
        return view('client.carts.checkout');
    }
    public function blog(){
        $blogs=$this->blogs->paginate(10);
        return view('client.blogs.blog', compact('blogs'));
    }
    public function blog_details($slug){
        $blog=$this->blogs->findBySlug($slug);
        return view('client.blogs.blog_details', compact('blog'));
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
 

}
