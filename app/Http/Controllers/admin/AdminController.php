<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\OrderDetail;
use App\Repositories\Contracts\AdminInterface;
use App\Repositories\Contracts\BlogInterface;
use App\Repositories\Contracts\BrandInterface;
use App\Repositories\Contracts\CommentInterface;
use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Contracts\CustomerInterface;
use App\Repositories\Contracts\OrderDetailInterface;
use App\Repositories\Contracts\ProductInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{

    /**
    * @var Interface|\App\Repositories\Contracts
    */
    protected $order_repo;
    protected $order_detail_repo;
    protected $comment_repo;
    protected $customer_repo;
    protected $product_repo;
    protected $brand_repo;
    protected $blog_repo;
    
    public function __construct(
        OrderInterface $order_repo,
        OrderDetailInterface $order_detail_repo,
        CommentInterface $comment_repo,
        CustomerInterface $customer_repo,
        ProductInterface $product_repo,
        BrandInterface $brand_repo,
        BlogInterface $blog_repo
    )
    {
        $this->order_repo = $order_repo;
        $this->order_detail_repo = $order_detail_repo;
        $this->comment_repo = $comment_repo;
        $this->customer_repo = $customer_repo;
        $this->product_repo = $product_repo;
        $this->brand_repo = $brand_repo;
        $this->blog_repo = $blog_repo;
    }

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('adminAuth');
    // }

    public function index()
    {
        $all_order = $this->order_repo->getAll();
        $all_comment = $this->comment_repo->getAll();
        $all_customer = $this->customer_repo->getAll();
        $all_product = $this->product_repo->getAll();
        $all_brand = $this->brand_repo->getAll();
        $all_blog = $this->blog_repo->getAll();
        return view('dashboard.index', compact(
                                                'all_order',
                                                'all_comment',
                                                'all_customer',
                                                'all_product',
                                                'all_brand',
                                                'all_blog'
                                            ));
    }

    public function file(){
        return view('dashboard.filemanager.index');
    }

    public function filter_chart_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = $this->order_detail_repo->get_date_between($from_date, $to_date);
        foreach ($get as $key => $value) {
            $chartData[] = array(
                'quantity' => $value->quantity,
                'date' => Carbon::parse($value->date)->format('d-m-Y'),
                'sales' => $value->sales,
                'profit' => $value->profit
            ); 
        }
        return $data = json_encode($chartData);
    }
}
