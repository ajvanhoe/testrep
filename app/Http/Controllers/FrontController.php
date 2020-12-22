<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Http\Request;
use App\Page as Page;
use App\Post as Post;
use App\Keyword as Keyword;


class FrontController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //   //
    // }


    public function get_articles($article=null) {

        if(!$article) {
          $articles = Post::orderBy('created_at','desc')->paginate(3);
          $page = Page::where('slug', 'news')->first();
          return view('theme.news')->with('page', $page)
                                           ->with('articles', $articles);
                                           
        }

        $article = Post::where('slug', $article)->first();
        if(!$article) {
          abort(404);
        }
        $page = Page::where('slug', 'article')->first();
        return view('theme.article')->with('page', $page)
                                    ->with('article', $article);

    }


    /* homepage */
    public function get_home_page() {
      $page = Page::where('slug', '')->orwhere('slug', 'home')->first();
      
      if(!$page) { // ako nema homepagea vraca view 404 (default laravel = kao da je greska)
       abort(404);
      } 
      return view('theme.home')->with('page', $page);
    }

    /* regural page */
    public function get_page($slug) {

      // ako je homepage vraca na homepage
      if(!$slug || $slug=='' || $slug === 'home'){
        return $this->get_home_page();
      }
      $page = Page::where('slug', $slug)->first();

      if(!$page) {  // ako nema strane trazi kljucnu rec --> pa landing
        $keywords = Keyword::where('slug', $slug)->first();

        if(!$keywords) { //ako nema ni kljucne reci vraca 404
              abort(404);
          }     

        // nakon toga proverava da li ima zaseban landing

        $keywords->landing_id ? $page = $keywords->landing_page : 
        $page = Page::where('slug','main')->where('type', 'landing')->first();
                
        $page->keywords;
        return view('theme.landing', compact('page','keywords'));

      }     

      return view('theme.page')->with('page', $page);
    }

    /* category */
    public function get_category_page($category, $slug) {
      
        $page = Page::where('slug', $slug)->first();

        if(!$page) {  // ako nema strane trazi kljucnu rec --> pa landing
          $keywords = Keyword::where('slug', $slug)->first();
  
          if(!$keywords) { //ako nema ni kljucne reci vraca 404
                abort(404);
          }     

        $keywords->landing_id ? $page = $keywords->landing_page : 
        $page = Page::where('slug','main')->where('type', 'landing')->first();
                
        $page->keywords;
        return view('theme.landing', compact('page','keywords'));
        }

        return view('theme.page')->with('page', $page);
        
    }


}
