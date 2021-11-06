<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Contracts\CategoryBlogInterface;
use App\Repositories\Contracts\CategoryInterface;
class CategoryComposer
{

    protected $categoryblog;
    protected $cate_repo;
    /**
     * Create a new profile composer.
     *
     * @return  void
     */
    public function __construct(CategoryBlogInterface $categoryblog,CategoryInterface $cate_repo)
    {
        $this->cate_repo = $cate_repo;
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
            ['all_category' => $this->cate_repo->getAll(),
            'menus_desktop' => $this->cate_repo->showMenuDesktop($this->cate_repo->getAll()),
            'menus_mobile' => $this->cate_repo->showMenuMobile($this->cate_repo->getAll()),
            'modelcategoryblog'=>$this->categoryblog->getCategoryBlogActive(),
           ]);
       
    }
}