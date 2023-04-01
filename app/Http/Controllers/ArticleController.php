<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $data = [
            ["title" => "Article One"],
            ["title" => "Article Two"],
            ["title" => "Article Three"],
            ["title" => "Article Four"],
            ["title" => "Article Five"],
        ];
        return view('articles.index', [
            "articles" => $data
        ]);
    }

    public function detail($id)
    {
        return "Article Controller Detail = $id";
    }
}
