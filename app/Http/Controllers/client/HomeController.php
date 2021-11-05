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
    public function __construct(CategoryBlogInterface $categoryblog,BlogInterface $blogs,ProductInterface $product_repo, VariantProductInterface $variant_product_repo, CategoryInterface $cate_repo, BrandInterface $brand_repo, BannerInterface $banner_repo, SettingLinkInterface $setting_link_repo)

    {
        $this->product_repo = $product_repo;
        $this->variant_product_repo = $variant_product_repo;
        $this->cate_repo = $cate_repo;
        $this->brand_repo = $brand_repo;
        $this->banner_repo = $banner_repo;
        $this->setting_link_repo = $setting_link_repo;
        $this->categoryblog=$categoryblog;
        $this->blogs=$blogs;
        // load list menu category start
        $this->all_category = $this->cate_repo->getAll();
        // show category menu desktop
        $this->menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
        // show category menu mobile
        $this->menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // load list menu category end
        
        view()->share(['all_category' => $this->all_category,'menus_desktop' => $this->menus_desktop, 'menus_mobile' => $this->menus_mobile]);

    }

    /**
     * return index
     *   
     */ 
    public function index(){
        $all_product = $this->product_repo->getAll();
        $all_brand = $this->brand_repo->getAll();
        $all_banner = $this->banner_repo->getAll();
        $all_setting_link = $this->setting_link_repo->getAll();
        return view('client.index', compact('all_product', 'all_brand', 'all_banner', 'all_setting_link'));
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
        $categoryblog=$this->categoryblog->getCategoryBlogActive();
        return view('client.blogs.blog', compact('all_category', 'menus_desktop', 'menus_mobile','blogs','categoryblog'));
    }
    public function blog_details($slug){
        $blog=$this->blogs->findBySlug($slug);
        $categoryblog=$this->categoryblog->getCategoryBlogActive();
        return view('client.blogs.blog_details', compact('blog','categoryblog','all_category', 'menus_desktop', 'menus_mobile'));
    }
    public function categoryblog($slug){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        $blogs=$this->categoryblog->findBySlug($slug);
        $categoryblog=$this->categoryblog->getCategoryBlogActive();
        return view('client.blogs.blog', compact('blogs','categoryblog','all_category', 'menus_desktop', 'menus_mobile'));
    }
 

}
