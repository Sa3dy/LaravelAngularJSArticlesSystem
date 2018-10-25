<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Response;
use \Illuminate\Http\Response as Res;

class ApiController extends Controller
{
    public function getAllArticles() {
        return \App\Article::with(['category', 'comments'])->get();
    }

    public function getAllCategories() {
        return \App\Category::all();
    }

    public function getAllComments() {
        return \App\Comment::all();
    }

    public function setArticleComment($id, $text) {
        $comment = new \App\Comment([
            'article_id' => $id,
            'text' => $text
        ]);
        $comment->save();
        return ['success' => 'added'];
    }

    public function getArticlesByCategoryID($id) {
        return \App\Article::where('category_id', $id)->with(['category', 'comments'])->get();
    }
}
