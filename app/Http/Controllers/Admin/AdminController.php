<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;

class AdminController extends Controller
{
    public function index() {
        $articles = Article::simplePaginate(6);
        return view("admin.index", compact(["articles"]));
    }

    public function create() {
        return view("admin.Article.create");
    }

    public function store(Request  $request) {
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->text = $request->text;
        $article->save();
        return redirect("/dashboard")->with('success', 'Success Create');
    }

    public function view($id) {
        $article = Article::with('images')->find($id);
        return view("admin.Article.view", compact(["article"]));
    }

    public function image($article_id, Request $request) {

        $image = new Image();
        $image->article_id = $article_id;

        if($request->hasFile('image')){
            $destination_path = "public/images/articles";
            $image_n = $request->file('image');
            $image_name = $image_n->getClientOriginalName();
            $request->file('image')->storeAs($destination_path,$image_name);
            $image->image = $image_name;
        }

        $image->save();

        return redirect("/dashboard")->with('success', 'Success Create');
    }

    public function delete($id) {
        Image::where('article_id', $id)->delete();
        Article::find($id)->delete();
        return back();
    }

    public function edit($id) {
        $article = Article::find($id);
        return view("admin.Article.edit", compact(["article"]));
    }

    public function update($id, Request $request) {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->text = $request->text;

        $article->save();
        return redirect('/dashboard')->with('success', 'Success Update');
    }
}
