<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Page extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'slug'      => $this->slug,
            'index'     => $this->index,    
           // 'urlwords'  => json_decode($this->urlwords),
            'content'   => $this->content,
        ];

    }

    public function with($request)
    {
        return [
            'meta' => [
                'title'       => $this->metatags->title,
                'description' => $this->metatags->description,
                'keywords'    => $this->metatags->keywords,
                'robots'      => $this->metatags->robots,
            ],
        ];
    }
}
