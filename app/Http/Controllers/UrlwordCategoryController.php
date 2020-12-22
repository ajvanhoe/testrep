<?php

namespace App\Http\Controllers;

use App\UrlwordCategory as Category;
use Illuminate\Http\Request;

class UrlwordCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => ['required', 'unique:urlword_categories', 'string', 'max:255'],
        ]);

        return $new_category = Category::create($request->all()) ? redirect()->route('urlwords.index')->with('success', 'Category added!') : redirect()->back()->with('error',
        'Something went wrong, please try again.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UrlwordCategory  $urlwordCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UrlwordCategory $urlwordCategory)
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UrlwordCategory  $urlwordCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UrlwordCategory $urlwordCategory)
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UrlwordCategory  $urlwordCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UrlwordCategory  $urlwordCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        foreach($category->urlwords as $keyword) {
            $keyword->delete();
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category removed!');
    }
}
