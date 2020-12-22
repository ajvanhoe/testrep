<?php

namespace App\Http\Controllers;

use App\Page;
use App\Metatag as Metatag;
use App\KeywordCategory as Category;
use App\Media as Media;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landing_pages = Page::where('type', 'landing')->orderBy('index')->get(['id','title']);
        $regular_pages = Page::where('type', 'page')->where('parrent_id', null)->get(['id','title']);
        //dd($regular_pages);
        return view('dashboard.pages.index')->with('pages', $this->get_navbar_pages())
                                           ->with('regular_pages', $regular_pages)
                                            ->with('landing_pages', $landing_pages);
    }

    private function get_navbar_pages() {
        return Page::where('parrent_id',null)->where('type', 'home')->orderBy('index')->get(['id', 'title','slug']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metatags = Metatag::all();
        //$categories = Category::all();
        $pages = Page::all('id','title');
        return view('dashboard.pages.create', compact('metatags', 'pages'));
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
            'title'     => ['required', 'string', 'unique:pages', 'max:255'],
        ]);

        $new_page = new Page;
        $new_page->title = $request->title;
        $new_page->slug =  Str::slug($request->title ,'-');
        $new_page->type = $request->type;
        $new_page->index = (int)$request->index;
        $new_page->parrent_id = $request->parrent_id;
                
        // $validator = Validator::make($new_page->toArray(), [
        //     'title' => 'required|unique:pages|max:255',
        //     'slug'  => 'required|unique:pages',
 
        // ]);

        // if ($validator->fails()) {
        //     return redirect(route('pages.index'))
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        $new_page->save();
        return redirect(route('pages.index'))->with('success','Page is successfuly created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
       return redirect(route('pages.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $metatags = Metatag::all();
        $categories = Category::all();
        $pages = Page::all('id','title');
        return view('dashboard.pages.edit', compact('page', 'metatags', 'pages', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
        ]);

        if($page->slug !== $request->slug) {
            $validator = Validator::make($request->toArray(), [
                'slug'  => 'unique:pages',
            ]);
            if ($validator->fails()) {
                return redirect(route('pages.edit', $page->id))
                            ->withErrors($validator)
                            ->withInput();
            }
        }


        $page->title = $request->title;
        $page->slug =  Str::slug($request->slug ,'-');
        $page->parrent_id = $request->parrent_id;
        //$page->metatag_id = $request->metatag_id;
        $page->index = (int)$request->index;
        $page->type = $request->type;
        //$page->canonical = $request->canonical;
               
        $page->save();
        return redirect(route('pages.index'))->with('success','Page is successfuly edited!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        // obrisati i components

        foreach($page->sub_pages as $sub){
            $sub->delete();
        }

        $page->delete();

        return redirect(route('pages.index'))->with('success','Page is successfuly deleted!');
    }

   

    /***  TEMPLATES, KEYWORDS AND CONTENT EDIT ***/



    /**
     * Update the page templates.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */

    public function templates_update(Request $request, Page $page)
    {
        $page->template = $request->template;
        $page->landing_id = $request->landingpage;

        $page->save();

        session(['section'=> 'templates']);
        return redirect()->back()->with('success','Templates are successfuly edited!');
    }

    /**
     * Update the page content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */


    public function content_update(Request $request, Page $page)
    {
        $page->content = $request->content;
        $page->save();
              
        return redirect()->back()->with('success','Content is successfuly edited!');
    }

    /* GRID EDITOR */

    public function grid_editor(Page $page) {
        $media = Media::all();
        return view('dashboard.pages.grid', compact('page', 'media'));
    }


    
    /* KEYWORDS */

     
    public function keywords_update(Request $request, Page $page)
    {
       $category=Category::find($request->category_id);
       
       $ids = [];
        foreach($category->keywords as $keyword) {
            //$page->keywords()->attach($keyword->id);
            $ids[] = $keyword->id;
        }

        $page->keywords()->sync($ids);

        return back()->with('success', 'Keywords added to page');
    }

    
    public function keywords_remove(Request $request, Page $page)
    {
        $request->validate([
            'keywords' =>'required|array|min:1'
        ]);
     
     foreach($request->keywords as $keyword) {
         $page->keywords()->detach($keyword);
     }

     return back()->with('success', 'Keywords removed from page');

    }


    public function keywords_delete(Request $request, Page $page)
    {
        $page->keywords()->detach();
        return back()->with('success', 'Keywords removed from page');

    }



    public function landings() {
        $pages = Page::where('type', 'page')->orWhere('type', 'home')->get();
        $landings = Page::where('type', 'landing')->get();
        $categories = Category::all();
        
        return view('dashboard.landings', compact('pages', 'landings', 'categories'));
    }
    
     /* TRASHAREA */

    // public function urlwords_update(Request $request, Page $page) {
    //     if($request->first) {
    //            $page->urlwords = $this->urlword_mixer($request->first, $request->second, $request->third);
               
    //     } else {
    //         $page->urlwords = null;
    //     }

    //     $page->save();

    //     session(['section'=> 'keywords']);
    //     return redirect()->back()->with('success','Keywords are successfuly edited!');
    // }


    // public function urlwords_remove(Request $request, Page $page)
    // {

    //     $urlwords = (array)json_decode($page->urlwords);
    //     $selected_keywords = $request->keywords;
        
    //     foreach($selected_keywords as $keyword) {
    //         unset($urlwords[$keyword]);
    //     }

    //     $reindex = array_values($urlwords);
    //     $page->urlwords = json_encode($reindex, true);
    //     $page->save();

    //     session(['section'=> 'keywords']);
    //     return redirect()->back()->with('success','Keywords are successfuly removed!');

    // }


     

    // // novi generate keywords
    // // prima kategorije first-second-third
    // public function urlword_mixer($first, $second = null, $third = null) {

    //     $first_category = Category::find($first);
    //     $second_category = Category::find($second);
    //     $third_category = Category::find($third);

    //     // SEO
    //     $keywords = [];
    //     $slugs = [];
    //     $urlwords = [];

    //     foreach($first_category->urlwords as $keyword) {
    //         if($second_category) {
    //             foreach($second_category->urlwords as $second_keyword) {
    //                 if($third_category) {
    //                     foreach($third_category->urlwords as $third_keyword) {
    //                         $slugs[] = $keyword->slug.'-'.$second_keyword->slug.'-'.$third_keyword->slug;
    //                         $keywords [] = $keyword->name.' '.$second_keyword->name.' '.$third_keyword->name;
    //                     }
    //                 } else {
    //                     $slugs[] = $keyword->slug.'-'.$second_keyword->slug;
    //                     $keywords [] = $keyword->name.' '.$second_keyword->name;
    //                 } // end if($category_id_three)
    //             }
    //         } else {
    //             $slugs[] = $keyword->slug;
    //             $keywords[] = $keyword->name;
    //         } 
    //     }

    //     for ($i=0; $i<count($keywords); $i++) {
    //         $urlwords[$i]['name'] = $keywords[$i];
    //         $urlwords[$i]['slug'] = $slugs[$i];
    //     }

    //     //dd($urlwords);
        
    //     return json_encode($urlwords, true);
    // }






    // // trebalo bi da ide u services -> naknadno
    // public function generate_keywords($seo, $seo2a, $seo2b = null, $seo2c = null) {
    //     $urlwords =[];

    //     // SEO
    //     $seo_names = [];
    //     $seo_slugs = [];
    //     $seo_combined = [];

    //     // SEO1
    //     $level_one_names = [];
    //     $level_one_slugs = [];
    //     $level_one_combined = [];

    //     // SEO2
    //     $keywords = [];
    //     $slugs = [];
    //     $combined = [];

    //     $category = Category::find($seo);
    //     $category_a = Category::find($seo2a);
    //     if(!$category_a){
    //         $category_a = $category;
    //     }
    //     $category_b = Category::find($seo2b);
    //     $category_c = Category::find($seo2c);

        
       
    //         // Basic 
    //     foreach($category->urlwords as $seo_keyword) {
    //         if(count($seo_names) < 5) {
    //         $seo_names[] = $seo_keyword->name;
    //         $seo_slugs[] = $seo_keyword->slug;
    //         }
    //     }

    //     for ($i=0; $i<count($seo_names); $i++) {
    //         $seo_combined[$i]['name'] = $seo_names[$i];
    //         $seo_combined[$i]['slug'] = $seo_slugs[$i];
    //     }


    //     // ovako za sada pa eventualno promeniti
    //     foreach($category_a->urlwords as $keyword) {
    //         if($category_b) {
    //             foreach($category_b->urlwords as $second_keyword) {
    //                  // prvi nivo ima samo 5 ključnih reči - promeniti
    //                 if(count($level_one_names) < 10) {
    //                     $level_one_slugs[] = $keyword->slug.'-'.$second_keyword->slug;
    //                     $level_one_names[] = $keyword->name.' '.$second_keyword->name;
    //                 }
    //                 // drugi nivo sve ukupno
    //                 if($category_c) {
    //                     foreach($category_c->urlwords as $third_keyword) {
    //                         $slugs[] = $keyword->slug.'-'.$second_keyword->slug.'-'.$third_keyword->slug;
    //                         $keywords [] = $keyword->name.' '.$second_keyword->name.' '.$third_keyword->name;
    //                     }
    //                 } else {
    //                     $slugs[] = $keyword->slug.'-'.$second_keyword->slug;
    //                     $keywords [] = $keyword->name.' '.$second_keyword->name;
    //                 } // end if($category_id_three)
    //             }
    //         } else {
    //             $slugs[] = $keyword->slug;
    //             $keywords [] = $keyword->name;

    //             if(count($level_one_names) < 5) {
    //                 $level_one_slugs[] = $keyword->slug;
    //                 $level_one_names[] = $keyword->name;
    //             }
    //         } // end if($category_id_two)

    //     }

    //     for ($i=0; $i<count($keywords); $i++) {
    //         $combined[$i]['name'] = $keywords[$i];
    //         $combined[$i]['slug'] = $slugs[$i];
    //     }

    //     for ($i=0; $i<count($level_one_names); $i++) {
    //         $level_one_combined[$i]['name'] = $level_one_names[$i];
    //         $level_one_combined[$i]['slug'] = $level_one_slugs[$i];
    //     }

    //     $urlwords['SEO'] = $seo_combined;
    //     $urlwords['SEO1'] = $level_one_combined;
    //     $urlwords['SEO2'] = $combined;

    //     return json_encode($urlwords, true);
    // }


    //  /**
    //  * Update the page keywords.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Page  $page
    //  * @return \Illuminate\Http\Response
    //  */
    // public function keywords_update(Request $request, Page $page)
    // {
    //     $request->seo ? 
    //     $page->urlwords = $this->generate_keywords($request->seo, $request->seo2a, $request->seo2b, $request->seo2c) 
    //     : $new_page->urlwords = null;

    //     $page->save();

    //     $section = 'keywords';
    //     return redirect()->back()->with('section', $section)
    //                              ->with('success','Keywords are successfuly edited!');
    // }

    
    // public function keywords_remove(Request $request, Page $page, $level)
    // {
    //     $urlwords = (array)json_decode($page->urlwords);
    //     $selected_keywords = $request->keywords;
    //     $selected_level = $urlwords[$level];

    //     foreach($selected_keywords as $keyword) {
    //         unset($selected_level[$keyword]);
    //     }

    //     $reindex = array_values($selected_level);
    //     $urlwords[$level] = $reindex;
               
       
    //     $page->urlwords = json_encode($urlwords, true);
    //     $page->save();

    //     session(['section'=> 'keywords']); 
    //     return redirect()->back()->with('success','Keywords are successfuly removed!');

    // }





}
