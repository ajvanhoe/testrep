<?php

namespace App\Http\Controllers;

use App\KeywordCategory as Category;
use Illuminate\Http\Request;

class KeywordCategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('keywords.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('keywords.index'));
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
            'name'     => ['required', 'unique:keyword_categories', 'string', 'max:255'],
        ]);

        return $new_category = Category::create($request->all()) ? redirect()->route('keywords.index')->with('success', 'Category added!') : redirect()->back()->with('error',
        'Something went wrong, please try again.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\keywordCategory  $keywordCategory
     * @return \Illuminate\Http\Response
     */
    public function show(KeywordCategory $keywordCategory)
    {
        return redirect(route('keywords.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\keywordCategory  $keywordCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(KeywordCategory $keywordCategory)
    {
        return redirect(route('keywords.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KeywordCategory  $keywordCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect(route('keywords.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KeywordCategory  $keywordCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        foreach($category->keywords as $keyword) {
            $keyword->delete();
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category removed!');
    }
}
