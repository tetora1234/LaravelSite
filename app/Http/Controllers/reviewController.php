<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\review;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

class reviewController extends Controller
{

    private $review;

    public function __construct(review $review)
    {
        $this->middleware('auth');
        $this->review = $review;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->middleware('auth');
        $product = product::find($id);
        return view('review.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $inputs = $request->all();
        $this->review->product_id = $id;
        $this->review->user_id = Auth::id();
        $this->review->fill($inputs)->save();

        return redirect()->action('productController@show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = $this->review->find($id);
        return view('review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = review::find($id);
        $inputs = $request->all();
        $review->fill($inputs)->save();

        return redirect()->action('dashboardController@reviews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->review->find($id)->delete();
        return redirect()->action('dashboardController@reviews');
    }
}
