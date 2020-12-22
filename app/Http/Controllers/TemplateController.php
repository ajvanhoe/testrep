<?php

namespace App\Http\Controllers;

use App\Template;
use App\Page;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Page $page)
    {
        
        //$template = Template::create($request->all());
        //$page->template_id = $template->id;
        //$page->save();

        return back()->with('success', 'Template created!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $resource = Template::find($id);
        $resource->hero = $request->hero;
        $resource->body = $request->body;
        $resource->template = $request->template;
        
        return $resource->save() ? back()->with('success', 'Template updated!') :  back()->with('danger', 'Something went wrong!');
    }

}
