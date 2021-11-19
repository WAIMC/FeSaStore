<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Contracts\CategoryBlogInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\VariantProductInterface;
use App\Helper\CartHelper;
class CategoryComposer
{

    protected $categoryblog;
    protected $cate_repo;
    protected $product_repo;
    protected $variant_product_repo;
    /**
     * Create a new profile composer.
     *
     * @return  void
     */
    public function __construct(
        CategoryBlogInterface $categoryblog,
        CategoryInterface $cate_repo,
        ProductInterface $product_repo,
        VariantProductInterface $variant_product_repo
    )
    {
        $this->cate_repo = $cate_repo;
        $this->product_repo = $product_repo;
        $this->variant_product_repo = $variant_product_repo;
        $this->categoryblog=$categoryblog;
    }

    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose(View $view)
    {
        // truyền dữ liệu ở đây nè
        $view->with(
            [
            'cate_repo' => $this->cate_repo,
            'all_category' => $this->cate_repo->getAll(),
            'menus_desktop' => $this->cate_repo->showMenuDesktop($this->cate_repo->getAll()),
            'menus_mobile' => $this->cate_repo->showMenuMobile($this->cate_repo->getAll()),
            'all_product' => $this->product_repo->getAll(), 
            'all_variant_pro' => $this->variant_product_repo->getAll(),
            'modelcategoryblog'=>$this->categoryblog->getCategoryBlogActive(),
            'cart'=>new CartHelper(),
           ]);
       
    }
}