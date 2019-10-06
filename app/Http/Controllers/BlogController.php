<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index()
    {
        $posts = Post::with('author')
            ->latestFirst()
            ->published()
            ->simplePaginate($this->limit);
            
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $categories = Category::with(['posts' => function($query) {
            $query->published();
        }])->orderBy('title', 'asc')->get();

        return view("blog.show", compact('post'));
    }

    public function category(Category $category)
    {
        $categoryName = $category->title;

        $posts = $category->posts()
                        ->with('author')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);

        return view('blog.index', compact('posts', 'categoryName'));
    }
}
