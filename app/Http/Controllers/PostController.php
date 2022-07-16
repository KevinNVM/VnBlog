<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'All Posts',
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(8), // N+1 Solved
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Post',
            'post' => $post,
        ]);
    }

    public function author() {
        return 'hello world';
    }

    public function authorPosts(User $author)
    {
        return view('posts', [
            'title' => "{$author->name}'s Posts",
            'posts' => $author->posts->load('category', 'author'), // N+1 Solved
            'categories' => Category::all(),
        ]);
    }

    public function authorDetail(User $author)
    {
        return view('author', [
            'title' => "{$author->name}'s Profile",
            'user' => $author
        ]);
    }

    public function categoryList()
    {
        return view('categories', [
            'title' => 'All Categories',
            'categories' => Category::all(),
            'count' => count(Category::all()),
        ]);
    }

    public function categoryPosts(Category $category)
    {
        return view('posts', [
            'title' => "Post by Category : $category->name",
            'posts' => $category->posts,
            'categories' => Category::all(),
        ]);
    }

}