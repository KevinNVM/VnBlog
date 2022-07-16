<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Facade\FlareClient\Time\Time;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $query = Post::where([
                ['user_id', '=', auth()->user()->id],
                ['title', 'LIKE', '%'.$request->search.'%'],
            ])->orWhere([
                ['user_id', '=', auth()->user()->id],
                ['title', 'LIKE', '%'.$request->search.'%'],
                ['body', 'LIKE', '%'.$request->search.'%']
            ])->get();
        } else {
            $query = Post::where([
                ['user_id', '=', auth()->user()->id],
            ])->get();
        }

        return view('dashboard.posts.index', [
            'posts' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'thumbnail' => 'image|file|max:2048',
            'body' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($validatedData['body'], 120, '...');

        if($request->HasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->thumbnail->store('post-thumbnails');
        }

        Post::create($validatedData);

        return redirect('dashboard/posts')->with('msg', [
            'status' => 'success',
            'body' => "✔️ Post <b>". Str::limit($validatedData['title'], 50, '...') ."</b> Has Been Added!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(401);
        }

        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return $post;
        if ($post->user_id !== auth()->user()->id) {
            abort(401);
        }

        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'thumbnail' => 'image|file|max:2048',
            'body' => 'required',
        ];

        if ($request->slug !== $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if (!$request->thumbnail) {
            $validatedData['thumbnail'] = $request->thumb_;
        } else {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('post-thumbnails');
            Storage::delete($post->thumbnail);
        }

        $validatedData['updated_at'] = now();
        $post->update($validatedData);

        return redirect('dashboard/posts')->with('msg', [
            'status' => 'success',
            'body' => "✔️ Post <b>". Str::limit($post->title, 50, '...') ."</b> Has Been Edited!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            Storage::delete($post->thumbnail);
        }

        Post::destroy($post->id);

        return redirect('dashboard/posts')->with('msg', [
            'status' => 'success',
            'body' => "✔️ Post <b>". Str::limit($post->title, 50, '...') ."</b> Has Been Deleted!"
        ]);
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}