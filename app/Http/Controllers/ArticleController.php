<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    public function search(Request $request){

        $input = $request->search;
        $orderByClause  = "CASE WHEN title = '".$input."' THEN 0 ELSE 1 END,";
        $orderByClause .= "CASE WHEN description = '".$input."' THEN 0 ELSE 1 END,";
        $orderByClause .= "CASE WHEN text = '".$input."' THEN 0 ELSE 1 END";

        $articles = Article::orderByRaw($orderByClause)->get();

        return view("search", compact(["articles"]));
    }
}
