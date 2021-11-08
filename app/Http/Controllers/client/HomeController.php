<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BannerInterface;
use App\Repositories\Contracts\BrandInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\SettingLinkInterface;
use App\Repositories\Contracts\VariantProductInterface;
use App\Repositories\Contracts\CategoryBlogInterface;
use App\Repositories\Contracts\BlogInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
    * @var Interface|\App\Repositories\Contracts
    */
    protected $product_repo;
    protected $variant_product_repo;
    protected $cate_repo;
    protected $brand_repo;
    protected $banner_repo;
    protected $setting_link_repo;
    protected $categoryblog;
    protected $blogs;
    protected $menus_desktop;
    protected $menus_mobile;
    protected $all_category;
    protected $all_product;
    protected $all_variant_pro;
    
    public function __construct(
      CategoryBlogInterface $categoryblog,
      BlogInterface $blogs,
      ProductInterface $product_repo,
      VariantProductInterface $variant_product_repo, 
      CategoryInterface $cate_repo, 
      BrandInterface $brand_repo, 
      BannerInterface $banner_repo, 
      SettingLinkInterface $setting_link_repo,
      VariantProductInterface $all_variant_pro)
    {
        $this->product_repo = $product_repo;
        $this->variant_product_repo = $variant_product_repo;
        $this->cate_repo = $cate_repo;
        $this->brand_repo = $brand_repo;
        $this->banner_repo = $banner_repo;
        $this->setting_link_repo = $setting_link_repo;
        $this->categoryblog=$categoryblog;
        $this->blogs=$blogs;
        $this->all_variant_pro = $all_variant_pro;

        // load all product for show modal product
        $this->all_product = $this->product_repo->getAll();
        // load all variant for show modal variant
        $this->all_variant_pro = $this->all_variant_pro->getAll();
        
        view()->share([
            'all_category' => $this->all_category,
            'menus_desktop' => $this->menus_desktop, 
            'menus_mobile' => $this->menus_mobile, 
            'all_product' => $this->all_product, 
            'all_variant_pro' => $this->all_variant_pro
        ]);
    }

    /**
     * return index
     *   
     */ 
    public function index(){
        $all_brand = $this->brand_repo->getAll();
        $all_banner = $this->banner_repo->getAll();
        $all_setting_link = $this->setting_link_repo->getAll();
        $paginate_cate = $this->cate_repo->paginate(7);
        return view('client.index', compact('all_brand', 'all_banner', 'all_setting_link', 'paginate_cate'));
    }

    public function about(){
        
        return view('client.pages.about');
    }

    public function contact(){
        
        return view('client.pages.contact');
    }

    public function shop(){
        
        return view('client.products.shop');
    }

    public function wishlist(){
        
        return view('client.wishlist');
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

    public function product(){
        
        return view('client.products.products');
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
 

}
