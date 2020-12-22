<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Page;
use App\Post;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('navbar_pages', Page::where('parrent_id',null)->where('type', 'home')->orderBy('index')->get(['id', 'title','slug']));
        //View::share('posts', Post::orderBy('created_at','desc')->limit(3)->get(['title', 'slug', 'created_at']));

        View::composer(['theme.partials.navbar', 'theme.partials.footer'], function($view){

            $view->with(
                [
                'navbar_pages' => Page::where('parrent_id',null)->where('type', 'home')->orderBy('index')->get(['id', 'title','slug']),
                'posts'        => Post::orderBy('created_at','desc')->limit(3)->get(['title', 'slug', 'created_at'])
                ]
            );

        });
    }
}
