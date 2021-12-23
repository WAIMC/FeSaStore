<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Http\Requests\Banner\UpdateBannerRequest;
use App\Repositories\Contracts\BannerInterface;
use Illuminate\Support\Str;
class BannerController extends Controller
{

    protected $banners;

    public function __construct(BannerInterface $banners)
    {
        $this->banners = $banners;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->banners->getAll();
        return view('dashboard.banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('dashboard.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBannerRequest $request)
    {
       $attribute=
       [
           'title'=>$request->title,
           'link'=>$request->link,
           'image'=>$request->image,
           'position'=>$request->position,
           'slug'=>Str::slug($request->title),
       ];
      $result=$this->banners->create($attribute);
      if($result){
          return redirect()->route('banner.index')->with('success','Thêm banner thành công!');
      }{
        return redirect()->route('banner.create')->with('error','Thêm banner thất bại!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('dashboard.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $attribute=
        [
            'title'=>$request->title,
            'link'=>$request->link,
            'image'=>$request->image,
            'status'=>$request->status,
            'position'=>$request->position,
            'slug'=>Str::slug($request->title),
        ];
       // dd($attribute);
        $result=$this->banners->update( $banner, $attribute);
        if($result){
            return redirect()->route('banner.index',$banner)->with('success','Cập nhật thành công!');
        }{
          return redirect()->route('banner.edit',$banner)->with('error','Cập nhật thất bại thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        {
            $result=$this->banners->destroy($banner);
            return redirect()->route('banner.index')->with('success','xóa thành công');
        }
    }
}
