<?php

namespace App\Http\Controllers;

use App\Post as Post;
//use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(3);
        return view('dashboard.posts.index')->with('posts', $posts);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lang=null)
    {
        // validacija        
        $this->validate($request, [
            'title'     => 'required',
            'post'      => 'required',
            'cover'     => 'image|nullable|max:1024|mimes:jpeg,bmp,png'
        ]);

        if ($request->hasFile('cover')) {

            // Get filename with the extension
            $fileNameWithExt = $request->file('cover')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $ext = $request->file('cover')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'-'.time().'.'.$ext;

                // resize 
               // $image = $request->file('cover');
               // $image_resize = Image::make($image->getRealPath());              
              //  $image_resize->resize(850, 400);
              //  $image_resize->save(public_path('images/posts/'.$fileNameToStore));

              $request->file('cover')->move('images/posts', $fileNameToStore);
            
        } else {
            // In case no image was uploaded
            $fileNameToStore = null;
        }

        // create new 
        $new_post = new Post;
        $new_post->title = $request->title;
        $new_post->post  = $request->post;
        $new_post->slug  = Str::slug($request->title ,'-');
        $new_post->image = $fileNameToStore;

        $validator = Validator::make($new_post->toArray(), [
            'title' => 'required|unique:posts|max:255',
            'slug'  => 'required|unique:posts',
 
        ]);

        if ($validator->fails()) {
            return redirect(route('posts.index'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $new_post->save();
        return redirect(route('posts.index'))->with('success', 'Article is successfuly created!');
                                           
    }

    /**
     * Show the form for editing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit')->with('post', $post);
    }



    public function remove_image($id) {

        $post = Post::findOrFail($id);
        $file_path = public_path('images/posts/'.$post->image); 
            if(file_exists($file_path)) {unlink($file_path);}
        $post->image = null;
        $post->save();

        return redirect()->back();
    }


   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'title'     => 'required',
            'post'      => 'required',
            'cover'     => 'image|nullable|max:1024|mimes:jpeg,bmp,png'
        ]);

        
        $edit = Post::findOrFail($id);

        if ($request->hasFile('cover')) {

            // Get filename with the extension
            $fileNameWithExt = $request->file('cover')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $ext = $request->file('cover')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'-'.time().'.'.$ext;

                // resize 
               // $image = $request->file('cover');
               // $image_resize = Image::make($image->getRealPath());              
               // $image_resize->resize(850, 400);
               // $image_resize->save(public_path('images/posts/'.$fileNameToStore));

               $request->file('cover')->move('images/posts', $fileNameToStore);

                $edit->image = $fileNameToStore;
        } 

        $edit->title = $request->title;
        $edit->post = $request->post;
        $edit->slug = Str::slug($request->title ,'-');

        $edit->save();
        return redirect(route('posts.index'))->with('success', 'Article is successfuly edited!');
                                                    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post=Post::findOrFail($id);
        if($post->image) {
            $file_path = public_path('images/posts/'.$post->image); 
            if(file_exists($file_path)) {unlink($file_path);}
        }
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Article is successfuly deleted!');
                                              
    }
}
