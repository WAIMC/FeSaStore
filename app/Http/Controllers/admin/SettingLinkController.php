<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\settingLink;
use App\Repositories\Contracts\SettingLinkInterface;
use Illuminate\Http\Request;


class SettingLinkController extends Controller
{

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
        // $data_st = settingLink::all();
        $data_st = $this->setting_link_repo->getAll();
        return view('dashboard.settingLinks.index',compact('data_st'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, settingLink $settingLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(settingLink $settingLink)
    {
        //
    }
}
