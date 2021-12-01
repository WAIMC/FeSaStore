<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\customer;
use App\Repositories\Contracts\CustomerInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
    * @var SettingLinkInterface|\App\Repositories\Contracts
    */
    protected $customer_repo;  
    
    public function __construct(CustomerInterface $customer_repo)
    {
        $this->customer_repo = $customer_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_customer = $this->customer_repo->getAll();
        return view('dashboard.customer.index', compact('data_customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $attributes = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'address' => $request->street.', '.$request->ward.', '.$request->district.', '.$request->conscious
        ];
        if($this->customer_repo->create($attributes)){
            return redirect()->back()->with('success', 'Thêm Khách Hàng Thành Công !');
        }else{
            return redirect()->back()->with('error', 'Thêm Khách Hàng Thất Bại !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        return view('dashboard.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, customer $customer)
    {
        $attributes = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->street.', '.$request->ward.', '.$request->district.', '.$request->conscious
    ];
    if($this->customer_repo->update($customer, $attributes)){
        return redirect()->back()->with('success', 'Sửa Thông Tin Khách Hàng Thành Công !');
    }else{
        return redirect()->back()->with('error', 'Sửa Thông Tin Khách Hàng Thất Bại !');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        if($customer->customer_product_rating()->count() > 0){
            return redirect()->back()->with('error', 'Vui lòng xóa hết đánh giá sao sản phẩm của khách hàng này trước !');
        }elseif($customer->customer_product_comment()->count() > 0){
            return redirect()->back()->with('error', 'Vui lòng xóa hết bình luận sản phẩm của khách hàng này trước !');
        }elseif($customer->customer_order()->count() > 0){
            return redirect()->back()->with('error', 'Vui lòng xóa hết đơn hàng của khách hàng này trước !');
        }
        elseif($customer->customer_blog_comment()->count() > 0){
            return redirect()->back()->with('error', 'Vui lòng xóa hết bình luận bài viết của khách hàng này trước !');
        }
        else{
            if($this->customer_repo->destroy($customer)){
                return redirect()->back()->with('success', 'Xóa khách hàng thành công !');
            }else{
                return redirect()->back()->with('error', 'Xóa khách hàng thất bại !');
            }
        }
    }
}
