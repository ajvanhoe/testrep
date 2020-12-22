<?php

namespace App\Http\Controllers;

use App\Keyword as Keyword;
use App\KeywordCategory as Category;
use App\Page as Page;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;






class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.keywords.index')->with('categories', $categories);
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
        
        $titles = $request->title;

        $to_check = [];
        $i=0;
        
        foreach ($titles as $title) {
            $to_check[$i]['title'] = $title;
            $i++;
        }

        $validator = Validator::make($to_check, [
            '*.title' => 'unique:keywords',
        ]);

        if ($validator->fails()) {
            return redirect(route('keywords.index'))
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach($titles as $keyword) {
            if($keyword) {
                $new_keyword = new Keyword;
                $new_keyword->title = $keyword;
                $new_keyword->keyword_category_id = (int)$request->keyword_category_id;
                $new_keyword->slug =  Str::slug($keyword ,'-');
                $new_keyword->save();
            }    
        }
        return redirect()->route('keywords.index')->with('success', 'Keywords added!');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('keywords.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect(route('keywords.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect(route('keywords.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keyword = Keyword::find($id)->delete();
        return redirect()->back()->with('success', 'Keyword removed!');
    }




    public function add_landings(Request $request) {

        //dd($request);

        if($request->landingpage) {
            foreach($request->keywords as $keyword) {
                $update = Keyword::find($keyword);
                $update->landing_id = $request->landing;
                $update->save();
            }

        return redirect(route('landings'))->with('success', 'Keywords updated!');
        
        } elseif ($request->regularpage) {

            $verify = [];
            $i = 0;

            foreach($request->keywords as $keyword) {
                $update = Keyword::find($keyword);
                $verify[$i]['title'] = $update->title;
                $verify[$i]['slug'] = $update->slug;
                $i++;
            }

            //dd($verify);
            $validator = Validator::make($verify, [
                '*.slug' => 'unique:pages',
            ]);
    
            if ($validator->fails()) {
                return redirect(route('landings'))
                            ->withErrors($validator)
                            ->withInput();
            } else {

                $i = 1;
                foreach($verify as $new) {

                    $new_page = new Page;
                    $new_page->title = $new['title'];
                    $new_page->slug = $new['slug'];
                    $new_page->type = 'page';
                    $new_page->index = $i;
                    $new_page->parrent_id = $request->regular;
                    $new_page->metatag_id = 1;                    
                    $new_page->save();
                    $i++;
                }

                return redirect(route('pages.index'))->with('success', 'Pages added!');
            }
            
           
        }

        abort(404);




    }



    public function add_landing_images(Request $request) {
        $this->validate($request, [
            'category'   => 'required',
            'cover'      => 'required|image|nullable|max:360|mimes:jpeg'
        ]);

        

        $category = Category::find($request->category);
        if ($request->hasFile('cover')) {
            
            // Get filename with the extension
            $cover = time().'-'.$request->file('cover')->getClientOriginalName();
            // Get just extension
            $ext = $request->file('cover')->getClientOriginalExtension();
            // path
            $directoryPath = public_path().'/images/uploads';
            // file
            $file = $directoryPath . '/' . $cover;
           
            // Move            
            $request->file('cover')->move($directoryPath, $cover);

            // copy image for every keyword
            foreach($category->keywords as $keyword) {
                $fileName = $keyword->slug . '.' . $ext;
                $newFile = public_path().'/images/landings/'.$fileName;

                if(!file_exists($newFile)) {
                    copy($file, $newFile);
                } else {
                    unlink($newFile);
                    copy($file, $newFile);
                }
            }
        
        } 

        return redirect()->back()->with('success', 'Images added!');

    }





}
