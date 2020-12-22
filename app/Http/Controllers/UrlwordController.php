<?php

namespace App\Http\Controllers;

use App\Urlword as Keyword;
use App\UrlwordCategory as Category;

use App\Keyword as NewKeyword;
use App\KeywordCategory as NewCategory;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.urlwords.index')->with('categories', $categories);
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
            'name'     => ['required'],
        ]);

        foreach($request->name as $keyword) {
            if($keyword) {
                $new_keyword = new Keyword;
                $new_keyword->name = $keyword;
                $new_keyword->urlword_category_id = (int)$request->urlword_category_id;
               // $new_keyword->slug =  Str::slug($keyword ,'-');
                $new_keyword->save();
            }    
        }
        return redirect()->route('urlwords.index')->with('success', 'Keywords added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Urlword  $urlword
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Urlword  $urlword
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Urlword  $urlword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect(route('urlwords.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Urlword  $urlword
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keyword = Keyword::find($id)->delete();
        return redirect()->back()->with('success', 'Keyword removed!');
    }

    /**
     * Mixes the url words in eaach given category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function mixer(Request $request) {

        
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category'     => 'required|array|min:1|max:3',
        ]);
        
        $categories = [];

        foreach ($request->category as $urlword_category) {
            $found = Category::find($urlword_category['id']);
            $found ? $categories[] = $found : $found = null;
        }

        $first_category = null;
        $second_category = null;
        $third_category = null;
        $keywords = [];

        $seo = [];

        if (count($categories)){
            $first_category = $categories[0];
            if(count($categories) >1) {
                $second_category = $categories[1];
                if(count($categories)> 2) {
                    $third_category = $categories[2];
                }
            }
        }
        if($first_category) {
            foreach($first_category->urlwords as $keyword) {
                if($second_category) {
                    foreach($second_category->urlwords as $second_keyword) {
                        if($third_category) {
                            foreach($third_category->urlwords as $third_keyword) {
                            $keywords[] = $keyword->name.' '.$second_keyword->name.' '.$third_keyword->name;
                                $seo[] = [
                                    'SEO1' => $keyword->name,
                                    'SEO2' => $second_keyword->name,
                                    'SEO3' => $third_keyword->name
                                ];
                            }
                        } else {
                            $keywords [] = $keyword->name.' '.$second_keyword->name;
                            $seo[] = [
                                'SEO1' => $keyword->name,
                                'SEO2' => $second_keyword->name
                            ];
                        } // end if($category_id_three)
                    }
                } else {
                    $keywords[] = $keyword->name;
                    $seo[] = [
                        'SEO1' => $keyword->name
                    ];
                } 
            }
        }


        

        $new_keywords = [];
        $i = 0;
        foreach($keywords as $new) {
            
            $new_keywords[$i]['title'] = $new;
            $new_keywords[$i]['slug'] = Str::slug($new ,'-');
            $new_keywords[$i]['levels'] = json_encode($seo[$i]);
            $i++;
        }

        
        //dd($new_keywords);
        
        $validator = Validator::make($new_keywords, [
            '*.slug' => 'required|unique:keywords|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(route('urlwords.index'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $new_category = NewCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        $id = (int) $new_category->id;

        foreach ($new_keywords as $new_keyword) {
               $create = NewKeyword::create([
                    'title' => $new_keyword['title'],
                    'slug'  => $new_keyword['slug'],
                    'levels' => $new_keyword['levels']
                ]);
                // iz nekog razloga nece drugacije -> !
               $create->keyword_category_id = $id;
               $create->save();
            
        }


        return redirect()->route('keywords.index')->with('success', 'New Category added!');



        
    }



}
