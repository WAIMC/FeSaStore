<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\Slider\CreateSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Repositories\Contracts\SliderInterface;
use Illuminate\Support\Str;


class SliderController extends Controller
{
    protected $sliders;

    public function __construct(SliderInterface $sliders)
    {
        $this->sliders = $sliders;
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->sliders->paginate(10);
        return view('dashboard.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSliderRequest $request)
    { 
        $attribute=
        [
            'title'=>$request->title,
            'link'=>$request->link,
            'image'=>$request->image,
            'slug'=>Str::slug($request->title),
            'status'=>$request->status,
        ];
       $result=$this->sliders->create($attribute);
       if($result){
           return redirect()->route('slider.index')->with('success','Thêm banner thành công!');
       }{
         return redirect()->route('slider.create')->with('error','Thêm banner thất bại!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.slider.edit',compact('slider'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        // $slider->update($request->only('title','slug','link','file_upload','status'));
        // return redirect()->route('slider.index')->with('success','Sửa thành công');
        $attribute=
        [
            'title'=>$request->title,
            'link'=>$request->link,
            'image'=>$request->image,
            'status'=>$request->status,
            'slug'=>Str::slug($request->title),
        ];
       // dd($attribute);
        $result=$this->sliders->update( $slider, $attribute);
        if($result){
            return redirect()->route('slider.edit',$slider)->with('success','Cập nhật thành công!');
        }{
          return redirect()->route('slider.edit',$slider)->with('error','Cập nhật thất bại thất bại!');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->with('success','xóa thành công');
    }
}
