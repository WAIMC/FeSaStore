<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductRating;
use App\Http\Requests\Rating\CreateRatingRequest;
use App\Repositories\Contracts\RatingInterface;
use Illuminate\Http\Request;


class RatingController extends Controller
{
    protected $rating;
    public function __construct(RatingInterface $rating){
        $this->rating = $rating;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->rating->GetListRating();
        return view('dashboard.rating.index',compact('data'));
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
    public function store(CreateRatingRequest $request)
    {
        $attribute=[
            'star_rating'=>$request->star_rating,
            'product_id'=>$request->product_id,
            'customer_id'=>$request->customer_id
        ];

        if($this->rating->create($attribute)){
            $data_rating=$this->rating->FindRating($request->product_id);

            $avg_rating = $this->rating->AvgRating($request->product_id);

            $number_rating = $this->rating->CountRating($request->product_id);

            return view('client.products.avg_rating',compact('number_rating','avg_rating'));
        }else{
            return redirect()->back()->with('error','Bình luận thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=$this->rating->FindRating($id);
        $avg_rating = $this->rating->AvgRating($id);
        return view('dashboard.rating.detail',compact('data','avg_rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductRating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRating $rating)
    {
        $result=$this->rating->destroy($rating);
        if($result){
            return redirect()->route('rating.show',$rating->product_id)->with('success','Xóa thành công !');
        }else{
            return redirect()->route('rating.index',$rating)->with('error','Xóa thất bại !');
        }
    }
}
