<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Libs\CommonFunctions;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('release_date', 'desc')->paginate(10);
        $articles = CommonFunctions::dateFormatting($articles);
        return response()->json($articles, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $article = Article::where('url', $url)->first();
        $article = CommonFunctions::mdParse($article);
        $article = CommonFunctions::dateFormatting($article);
        return $article;
    }
}
