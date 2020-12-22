<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page as Page;
use App\Post as Post;
use App\Http\Resources\Page as PageResource;

class ApiController extends Controller
{

  public function get_footer_posts() {
    return Post::orderBy('created_at','desc')->limit(3)->get(['title', 'slug', 'created_at']);
  }
  

  public function get_latest_news($article = null) {

    if(!$article) {
      $resource = Post::orderBy('created_at','desc')->limit(10)->get();
      return $resource->toArray();
    }


      $article = Post::where('slug', $article)->first();
      return $article->toArray();

  }

  /* trasharea */
    public function get_home_page() {
    
        $page = Page::where('slug', '')->first();

        if(!$page) {
          return 'Page not found!';
        } 
  
        return new PageResource($page);
       
    }


    public function get_page($slug) {
        if($slug==''){
            $this->get_home_page();
          }
    
          $page = Page::where('slug', $slug)->first();
          if(!$page) {
              return 'Page not found!';
              // ovo ili 404
            } 
    
        return new PageResource($page);
    }


    // landingpage - prepraviti za da vraca podatke na api
    
    public function get_landing_page($slug, $keywords) {

        // da li ima keywords svoj zaseban page?
        $keywords_page = Page::where('slug', $keywords)->first();
        
        if($keywords_page) { // ako ima vraca tu stranu kao landing
            $landingpage = $keywords_page;
            // sa keywords izvucenim iz linka
            $keywords = ucwords(str_replace('-', ' ', $keywords));
            return new PageResource($landingpage);
        }

        // u slucaju da nema trazi stranu sa koje je stigao upit ($keywords)
        
        // 1 keywords -konstanta  - glavne reci za prikaz na strani (iz linka)
        $keywords = ucwords(str_replace('-', ' ', $keywords));
        // 2  origin i njegov landing
        $origin_page = Page::where('slug', $slug)->first();
        
        // ako nema origin strane vraca na welcome ( = kao da je greska)
        if(!$origin_page){
          return redirect(route('welcome'));
        }

        // u slucaju da nema landing trazi landing od origina pa ako nema vraca main landing!
        $landing_page = $origin_page->landing;
        $landing_page ? $landingpage = $landing_page : $landingpage = Page::where('slug', 'main')->where('type', 'landing')->first();

        if(!$landingpage) { // u slucaju da nema ni main landing vraca na pocetnu ( = kao da je greska)
          return redirect(route('welcome'));
        }

        // u krajnjem slucaju vraca main landing sa njegovim urlwordsima i glavni $keywords kao SEO

        return new PageResource($landingpage);
    }

}
