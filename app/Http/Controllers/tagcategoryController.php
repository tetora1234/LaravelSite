<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tagcategory;

class tagcategoryController extends Controller
{
    private $tagcategory;

    public function __construct(tagcategory $tagcategory)
    {
        $this->tagcategory = $tagcategory;
    }
}
