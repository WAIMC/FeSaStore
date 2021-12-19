<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Http\Request;
use App\Repositories\Contracts\RoleInterface;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;

class RoleController extends Controller
{

    /**
    * @var RoleInterface|\App\Repositories\Contracts
    */
    protected $role_repo;  
    
    public function __construct(RoleInterface $role_repo)
    {
        $this->role_repo = $role_repo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_role = $this->role_repo->getAll();
        return view('dashboard.role.index',compact('data_role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_route = Route::getRoutes();
        $routes = array();
        foreach ($all_route as $rou) {
            $get_name = $rou->getName();
            if(strpos($get_name, 'ignition') === false && strpos($get_name, 'client') === false && strpos($get_name, 'cart') === false && strpos($get_name, 'wishlist') === false){
                if(!in_array(substr($rou->getName(), 0, strpos($rou->getName(), '.')), $routes) && $rou->getName() !== null){
                    array_push($routes, substr($rou->getName(), 0, strpos($rou->getName(), '.')));
                }
            }
        }
        return view('dashboard.role.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $attributes = [
            'name'=>request()->name,
            'permission'=>json_encode($request->routes)
        ];

        if($this->role_repo->create($attributes)){
            return redirect()->back()->with('success', 'Thêm vai trò thành công.');
        }else{
            return redirect()->back()->with('error', 'Thêm vai trò thất bại.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        $all_route = Route::getRoutes();
        $routes = array();
        foreach ($all_route as $rou) {
            $get_name = $rou->getName();
            if(strpos($get_name, 'ignition') === false && strpos($get_name, 'client') === false && strpos($get_name, 'cart') === false && strpos($get_name, 'wishlist') === false){
                if(!in_array(substr($rou->getName(), 0, strpos($rou->getName(), '.')), $routes) && $rou->getName() !== null){
                    array_push($routes, substr($rou->getName(), 0, strpos($rou->getName(), '.')));
                }
            }
        }
        return view('dashboard.role.edit', compact('role','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, role $role)
    {
        $attributes = [
            'name'=>request()->name,
            'permission'=>json_encode($request->routes)
        ];

        if($this->role_repo->update($role ,$attributes)){
            return redirect()->back()->with('success', 'Cập nhật vai trò thành công.');
        }else{
            return redirect()->back()->with('error', 'Cập nhật vai trò thất bại.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        if($role->getAdmins()->count() > 0)
            return redirect()->route('role.index')->with('error', 'Bỏ Chọn Vai Trò Này Khỏi Các Quản Trị Trước !');
        else
            if($this->role_repo->destroy($role))
                return redirect()->route('role.index')->with('success', 'Xóa Vai Trò Thành Công!');
            else
                return redirect()->route('role.index')->with('error', 'Xóa Vai Trò Không Thành Công!');
    }
}
