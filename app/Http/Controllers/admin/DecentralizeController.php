<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Models\AdminRole;
use App\Repositories\Contracts\AdminInterface;
use App\Repositories\Contracts\AdminRoleInterface;
use App\Repositories\Contracts\RoleInterface;
use Illuminate\Http\Request;

class DecentralizeController extends Controller
{
    
    /**
    * @var AdminInterface|\App\Repositories\Contracts
    */
    protected $admin_repo; 
    protected $admin_role_repo;
    protected $role_repo;
    
    public function __construct(AdminInterface $admin_repo, AdminRoleInterface $admin_role_repo,RoleInterface $role_repo)
    {
        $this->admin_repo = $admin_repo;
        $this->admin_role_repo = $admin_role_repo;
        $this->role_repo = $role_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_decentralize = $this->admin_repo->getAll();
        return view('dashboard.decentralize.index', compact('data_decentralize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,admin $admin)
    {
        $get_admin = $this->admin_repo->find($request->id);
        $get_role = $this->role_repo->getAll();
        $getRoleChecked = $get_admin->adminRole()->get();
        $role_assignment = $get_admin->getRoles()->pluck('name','id')->toArray();
        return view('dashboard.decentralize.edit', compact('get_admin', 'get_role', 'getRoleChecked', 'role_assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        $getAdmin = $this->admin_repo->find($request->id);
        $getAllAdminRole = $this->admin_role_repo->getAll();
        if($getAdmin->adminRole()->count()>0){
            foreach ($getAllAdminRole as $del) {
                $this->admin_role_repo->DeleteAdminRole($getAdmin->id);
                // $getAllAdminRole->each->delete();
            }
            foreach ($request->role as $updateRole) {
                $attributes_admin_role = ['admin_id' => $getAdmin->id, 'role_id' => $updateRole];
                $this->admin_role_repo->create($attributes_admin_role);
            }
            return redirect()->back()->with('success','Cập nhật vai trò thành công !');
        }else{
            foreach ($request->role as $storeRole) {
                $attributes_admin_role_two = ['admin_id' => $getAdmin->id, 'role_id' => $storeRole];
                $this->admin_role_repo->create($attributes_admin_role_two);
            };
            return redirect()->back()->with('success','Cập nhật vai trò thành công !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
