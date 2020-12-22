<?php

namespace App\Http\Controllers;

use App\Media as Media;
use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = Media::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.media.create', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file'  => 'image|nullable|max:5000|mimes:jpeg,bmp,png' , // promeniti
        ]); 
      
        $media = new Media;

        if ($request->hasFile('file')) {

            $image = $request->file('file');

            // Get filename with the extension
            $fileNameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $ext = $image->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'.'.$ext;

            // $sizes = [
            //     'small'     => [150,150],
            //     'medium'    => [300,150],   
            //     'large'     => [1024,512],
            //     'full'      => [1200,600],
            // ];
            
            
            // foreach ($sizes as $key => $size) {
            //     $x = $size[0];
            //     $y = $size[1];

            //     // Thumbnail 

            //     //$thumbnail = $x.'x'.$y.'-'.$filename.$ext;
            //     $thumbnail = $key.'-'.$filename.'.'.$ext;
            //     // Resize image
            //     $image_resize = Image::make($image->getRealPath());              
            //     $image_resize->resize($x, $y);
            //     // Save thumbnail
            //     $image_resize->save(public_path('images/uploads/'.$thumbnail));
            // }

            // Save image to public folder
            // $image->move('images/uploads', $fileNameToStore);

            $request->file('cover')->move('images/uploads', $fileNameToStore);

            $media->file = $fileNameToStore;
            $media->title = $filename;
            $media->url = asset('images/uploads/'.$fileNameToStore);
        }

        
        $media->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        $this->validate($request, [
            'title'     => ['required', 'string', 'max:255'],
        ]);

        $input = $request->all(); 
        $db_fields = array_keys($media->getAttributes()); 
       
        foreach ($db_fields as $field) {
            if (array_key_exists($field, $input) && isset($input[$field])) {
                $media->$field = $input[$field];
            }
        }

        $media->save();
        return back()->with('success', 'Image updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        $sizes = [
            'small'     => [150,150],
            'medium'    => [300,150],   
            'large'     => [1024,512],
            'full'      => [1200,600],
        ];

        $file_path = public_path('images/uploads/'.$media->file); 
        if(file_exists($file_path)) {
            
            foreach($sizes as $key => $size) {
                $thumbnail = public_path('images/uploads/'.$key.'-'.$media->file); 
                if(file_exists($thumbnail)){ unlink($thumbnail); }
            }

            unlink($file_path);
            $media->delete();
        }

        return back()->with('success', 'Image removed!');
    }
}
