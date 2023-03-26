<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return "Article Controller Index";
    }

    public function detail($id)
    {
        return "Article Controller Detail = $id";
    }
}
