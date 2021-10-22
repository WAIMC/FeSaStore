<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\settingLink;
use App\Repositories\Contracts\SettingLinkInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Setting\CreateSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;

class SettingLinkController extends Controller
{


     /**
     * @var SettingLinkInterface|\App\Repositories\Contracts
     */

    protected $setting_link_repo;

    public function __construct(SettingLinkInterface $setting_link_repo)
    {
        $this->setting_link_repo = $setting_link_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->setting_link_repo->paginate(15);
        return view('dashboard.settingLinks.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.settingLinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSettingRequest $request)
    {
  $this->setting_link_repo->create($request->all());
  return redirect()->route('settingLink.index')->with('success', 'Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function show(settingLink $settingLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function edit(settingLink $settingLink)
    {
      return view('dashboard.settingLinks.edit',compact('settingLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, settingLink $settingLink)
    {
        $this->setting_link_repo->update($settingLink,$request->all());
        return redirect()->route('settingLink.index')->with('success', 'Cập nhật thành công !');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(settingLink $settingLink)
    {
        $this->setting_link_repo->destroy($settingLink);
        return redirect()->route('settingLink.index')->with('success', 'Xóa thành công !');;
    }
}
