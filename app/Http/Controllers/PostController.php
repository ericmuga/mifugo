<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Medium;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class PostController extends Controller
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
        return inertia('Post/Create',['animals'=>Animal::all('name','id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function contains($str, array $arr)
        {
            foreach($arr as $a) {
                if (stripos($str,$a) !== false) return true;
            }
            return false;
        }

    public function store(Request $request)
    {
        // dd($request->all());
       $type=null;
       $medium=null;
    // protected $fillable=['title','type','body','footer','dimension','user_id'];
       $request->validate([
                             'title'=>['required','unique:posts,title'],
                             'body'=>'required',
                             'dimension'=>'required',
                         ]);
        if($request->hasFile('avatar'))
         {


          $video_extensions = array("webm", "mp4", "ogv");

          $type=$this->contains($request->file('avatar')->getClientOriginalExtension(),$video_extensions)?'video':'photo';

           $path = $request->file('avatar')
                           ->store('',['disk'=>'public_uploads']);

          $medium= Medium::create([
                            'type'=>$type,
                            'slug'=>$path,
                            'user_id'=>Auth::user()->id,
                            'description'=>$request->media_description
            ]);

       }

       $post=Post::create([
                      'title'=>$request->title,
                      'body'=>$request->body,
                      'dimension'=>$request->dimension,
                      'footer'=>$request->has('footer')?$request->footer:'',
                      'user_id'=>Auth::user()->id,
                      'type'=>$type?$type:'photo'
                   ]);

        $post->animals()->attach($request->animal_id);
        $medium??$post->media()->attach($medium);

           return redirect(route('animals.show',$request->animal_id))->with('message','Post added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
