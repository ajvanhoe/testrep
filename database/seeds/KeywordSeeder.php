<?php

use Illuminate\Database\Seeder;

class KeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keywords = [ 
            
            [//1
            'title' =>'TCME Group Worldwide',
            'slug'  =>'tcme-group-worldwide'
            ],

            [//2
                'title' =>'GCI Global Citizenship Investment',
                'slug'  =>'gci-global-citizenship-investment'
            ],

            [//3
                'title' =>'Offshore Company Formation',
                'slug'  =>'offshore-company-formation'
            ],

            [//4
                'title' =>'Eastern European Investment',
                'slug'  =>'eastern-european-investment'
            ],

            [//5
                'title' =>'Executive Search',
                'slug'  =>'executive-search'
            ],

            [//6
                'title' =>'Cyber Security Protection',
                'slug'  =>'cyber-security-protection'
            ],

            [//7
                'title' =>'Foreign Economic Relationship',
                'slug'  =>'foreign-economic-relationship'
            ]
        ];

        $categories = [

            [//1
                'name' =>'General keywords',
                'description'  =>'TCME Company keywords.'
            ],

        ];
        
        foreach($categories as $category) {

            $category_resource = [
                    'name'    => $category['name'],
                    'description' => $category['description'],
            ];

            DB::table('keyword_categories')->insert($category_resource);
        }


        foreach($keywords as $keyword) {
            $levels['SEO1'] = $keyword['title'];
            
            $keyword_resource = [
                    'title'       => $keyword['title'],
                    'slug'        => $keyword['slug'],
                    'levels'      => json_encode($levels),
                    'keyword_category_id' => 1,
                    // timestapms
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
            ];

            DB::table('keywords')->insert($keyword_resource);
        }






    }
}
