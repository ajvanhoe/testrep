<?php

namespace App\Http\Controllers;

use App\Metatag as Metatag;
use Illuminate\Http\Request;

class MetatagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metatags = Metatag::all();
        return view('dashboard.metatags.index', compact('metatags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.metatags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $new_metatag = Metatag::create($this->validateRequest()) ? redirect()->route('metatags.index')->with('success', 'Metatag added!') : redirect()->back()->with('error',
            'Something went wrong, please try again.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metatag  $metatag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return redirect(route('metatags.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metatag  $metatag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metatag = Metatag::find($id);
        return view('dashboard.metatags.edit')->with('metatag', $metatag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metatag  $metatag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $resource = Metatag::findOrFail($id);
           
           // name is unique!
           if($request->name !== $resource->name) {
                $this->validateRequest();
           }
   
        $db_fields = array_keys($resource->getAttributes()); 

        // dynamically assigning fields
       foreach ($db_fields as $field) {
            if (array_key_exists($field, $input) && isset($input[$field])) {
                $resource->$field = $input[$field];
            }
        }
        return $resource->save() ? redirect()->route('metatags.index')->with('success', 'Metatag updated!') : redirect()->back()->with('error',
        'Something went wrong, please try again.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metatag  $metatag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metatag = Metatag::find($id)->delete();
        return redirect()->back()->with('success', 'Metatag removed!');
    }


    /**
     * Validating request for store or update method
     * 
     */

    private function validateRequest()
    {
        return request()->validate([
            'title'         => 'required|unique:metatags|min:3',
            //'title'         => 'required|min:3',
            'keywords'      => 'required',
            'description'   => 'required',
            //'robots'        => 'required',
        ]);
    }



}
