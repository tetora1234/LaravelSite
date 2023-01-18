<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\goodvalue;
use Illuminate\Support\Facades\Auth;

class goodvalueController extends Controller
{

    private $goodvalue;

    public function __construct(goodvalue $goodvalue)
    {
        $this->middleware('auth');
        $this->goodvalue = $goodvalue;
    }

    public function store($id)
    {
        $user_id = Auth::id();
        $goodvalue = $this->goodvalue
            ->where([
                ['user_id', '=', $user_id],
                ['product_id', '=', $id],
            ])
            ->first();

        $goodvalue = array('user_id' => $user_id, 'product_id' => $id);
        $this->goodvalue
            ->fill($goodvalue)
            ->save();

        $good_count = goodvalue::where([
            ['product_id', '=', $id],
        ])->count();

        $date = [
            'good_count' => $good_count,
        ];
        return response()->json($date);
    }

    public function destroy($id)
    {
        $goodvalue = $this->goodvalue
            ->where([
                ['user_id', '=', Auth::id()],
                ['product_id', '=', $id],
            ])
            ->first()->delete();

        $good_count = goodvalue::where([
            ['product_id', '=', $id],
        ])->count();

        $date = [
            'good_count' => $good_count,
        ];
        return response()->json($date);
    }
}
