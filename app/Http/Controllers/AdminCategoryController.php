<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'name' => 'required|max:128|unique:categories',
            'slug' => 'required|unique:categories',
            'description' => 'required|min:3'
        ]);

        Category::create($validatedData);

        return redirect('dashboard/categories')->with('msg', [
            'status' => 'success',
            'body' => "✔️ <b>". Str::limit($validatedData['name'], 50, '...') ."</b> Has Been Added!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return redirect('dashboard/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'description' => 'required|min:3'
        ];

        if ($request->slug !== $category->slug || $request->name !== $category->name) {
            $rules['slug'] = 'required|unique:categories';
            $ules['name'] = 'required|max:128|unique:categories';
        }

        $validatedData = $request->validate($rules);
        $category->update($validatedData);

        return redirect('dashboard/categories')->with('msg', [
            'status' => 'success',
            'body' => "✔️ <b>". Str::limit($category['name'], 50, '...') ."</b> Has Been Updated!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->destroy($category->id);

        return redirect('dashboard/categories')->with('msg', [
            'status' => 'success',
            'body' => "✔️ <b>". Str::limit($category['name'], 50, '...') ."</b> Has Been Deleted!"
        ]);
    }
}