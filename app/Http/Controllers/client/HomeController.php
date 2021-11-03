<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BannerInterface;
use App\Repositories\Contracts\BrandInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\SettingLinkInterface;
use App\Repositories\Contracts\VariantProductInterface;
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
    
    public function __construct(ProductInterface $product_repo, VariantProductInterface $variant_product_repo, CategoryInterface $cate_repo, BrandInterface $brand_repo, BannerInterface $banner_repo, SettingLinkInterface $setting_link_repo)
    {
        $this->product_repo = $product_repo;
        $this->variant_product_repo = $variant_product_repo;
        $this->cate_repo = $cate_repo;
        $this->brand_repo = $brand_repo;
        $this->banner_repo = $banner_repo;
        $this->setting_link_repo = $setting_link_repo;
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
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        
        return view('client.index', compact('all_category', 'all_product', 'all_brand', 'all_banner', 'all_setting_link', 'menus_desktop', 'menus_mobile'));
    }

    public function about(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.pages.about', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }

    public function contact(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.pages.contact', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }

    public function shop(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.products.shop', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }

    public function wishlist(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.wishlist', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }


    public function register(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.register', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }

    public function signIn(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.signIn', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }

    public function forgotPassword(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.forgotPassword', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }

    public function product(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.products.products', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }
    public function checkout(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.carts.checkout', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }
    public function blog(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.blogs.blog', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }
    public function blog_details(){
        // default load menu start
        $all_category = $this->cate_repo->getAll();
            // show menu desktop
            $menus_desktop = $this->cate_repo->showMenuDesktop($this->cate_repo->getAll());
            // show menu mobile
            $menus_mobile = $this->cate_repo->showMenuMobile($this->cate_repo->getAll());
        // default load menu end
        return view('client.blogs.blog_details', compact('all_category', 'menus_desktop', 'menus_mobile'));
    }


}
