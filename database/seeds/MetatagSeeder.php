<?php

use Illuminate\Database\Seeder;

class MetatagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metatags = [
            [ //1
              'title'       => 'Standard Metatag',
              'keywords'    => 'citizenship program,gci,buy passport,experts,foreign investors,permanent residence,business investments,residency,economic citizenship,european citizenship',
              'description' => 'GCI - Global Citizenship Investment. We are the worlds leading experts in advising foreign investors on Citizenship & Residency by Investment.',
              'robots'      => 'index, follow'
            ], 
            [ //2
                
                'title'       => 'Main Landing',
                'keywords'    => 'SEO1, citizenship program, gci, buy passport, experts, foreign investors, permanent residence, business investments, residency',
                'description' => 'SEO1 | GCI - Global Citizenship Investment. We are the worlds leading experts in advising foreign investors on Citizenship & Residency by Investment.',
                'robots'      => 'index, follow'
            ],
        ];

        foreach($metatags as $metatag){
            DB::table('metatags')->insert([
                'title'          => $metatag['title'],
                'keywords'       => $metatag['keywords'],
                'description'    => $metatag['description'],
                'robots'         => $metatag['robots']
            ]);
          }



    }
}
