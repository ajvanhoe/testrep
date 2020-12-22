<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages =  [

            [ // id:1
                'title'      => 'Home',
                'slug'       => '',
                'type'       =>'home',
                'urlwords'   =>'',
                'landing_id' =>null,
                'parrent_id' =>null,
                'metatag_id' => 1,
                'index' => 1,
  
            ],

            [ // id:2
                'title'      => 'About GCI',
                'slug'       => 'about-gci',
                'type'      =>'home',
                'urlwords'   =>'',
                'parrent_id'  =>null,
                'metatag_id' => 1,
                'index' => 2,

            ],

            [ // id:3
                'title'      => 'News',
                'slug'       => 'news',
                'type'      =>'home',
                'urlwords'   =>'',
                'parrent_id'  =>null,
                'metatag_id' => 1,
                'index' => 3,
           
            ],

            [ // id:4
                'title'      => 'Contact Us',
                'slug'       => 'contact-us',
                'type'      =>'home',
                'urlwords'   =>'',
                'parrent_id'  =>null,
                'metatag_id' => 1,
                'index' => 4,
   
            ],

            [ // id:5
                'title'      => 'Main',
                'slug'       => 'main',
                'type'       => 'landing',
                'urlwords'   => null,
                'parrent_id' => null,
                'metatag_id' => 2,
                'index' => 1
            ]

       
            

        ];


        foreach($pages as $page){

            $resource = [
                    'title'       => $page['title'],
                    'slug'        => $page['slug'],
                    'type'        => $page['type'],
                    'urlwords'    =>$page['urlwords'],
                    //'landing_id' =>$page['landing_id'],
                    'metatag_id' => $page['metatag_id'],
                    
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
    
                if(isset($page['index'])){
                    $resource['index'] = (int)$page['index'];
                }
    
                if(isset($page['parrent_id'])){
                    $resource['parrent_id'] = $page['parrent_id'];
                }
    
               DB::table('pages')->insert($resource);
           }


    }
}
