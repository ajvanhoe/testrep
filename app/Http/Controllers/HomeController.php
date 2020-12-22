<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Http\Request;
use App\Page as Page;
use App\Post as Post;
use App\Keyword as Keyword;


class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //$this->middleware('auth');
    }

    /* Sitemap */

    public function sitemap() {
      $pages = Page::where('type', 'home')->orWhere('type', 'page')->get();
      $keywords = Keyword::all();
      $path = public_path('sitemap.xml');
      //dd($path);
      
      // update sitemap;
      $sitemap = view('sitemap_xml', ['pages' => $pages, 'keywords'=> $keywords]);
      $sitemap->render();
        $fhandle = fopen($path, 'w');
        fwrite($fhandle, $sitemap);
        fclose($fhandle);

      return response()->view('sitemap_xml', ['pages' => $pages, 'keywords'=> $keywords])->header('Content-Type', 'text/xml');
    }


    public function contact() {
      
      $page = Page::where('slug', 'contact-us')->first();
      if(!$page) { abort(404); }
      //$captcha = $this->get_captcha_image();
      //session()->put('captcha', $captcha);
      
      return view('theme.page')->with('page', $page);
                              //->with('captcha', $captcha);
    }

    
}
