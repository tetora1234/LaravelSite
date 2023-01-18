<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\review;
use App\Models\tagcategory;
use App\Models\goodvalue;
use Illuminate\Support\Facades\Auth;


class productController extends Controller
{
    private $product;

    public function __construct(product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tagSearch = $request->tag;
        $contentSearch = $request->content;
        $tagcategorys = tagcategory::all();

        $products = $this->product
            ->when($tagSearch, function ($query, $tagSearch) {
                return $query->where('tag', 'LIKE', '%' . $tagSearch . '%');
            })
            ->when($contentSearch, function ($query, $contentSearch) {
                return $query->where('fulltext', 'LIKE', '%' . $contentSearch . '%');
            })
            ->orderBy('id')
            ->paginate(12);

        return view('product.index', compact('products', 'tagcategorys'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);

        $user_id = Auth::id();
        $good_value = goodvalue::where([
            ['product_id', '=', $id],
        ])->count();

        $good_check = goodvalue::where([
            ['user_id', '=', $user_id,],
            ['product_id', '=', $id,],
        ])->exists();

        $authorProdacts = product::query()
            ->when($id, function ($query, $id) {
                return $query->where('id', '!=', $id);
            })
            ->when($product->author, function ($query, $author) {
                return $query->where('author', 'LIKE', '%' . $author . '%');
            })->take(8)->get();

        $reviews = review::query()
            ->when($id, function ($query, $id) {
                return $query->where('product_id', '=', $id);
            })
            ->orderBy('created_at')
            ->get();

        return view('product.show', compact('good_check', 'product', 'authorProdacts', 'reviews', 'good_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function read($id)
    {
        $product = $this->product->find($id);
        return view('product.read', compact('product'));
    }
}
