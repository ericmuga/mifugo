<?php

namespace App\Http\Controllers;

use App\Models\{Animal, Dimension, Post};
use App\Http\Resources\{AnimalResource, DimensionResource, PostResource};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //send along dimensions
        return inertia('Animal/Create',['dimensions'=>Dimension::all('name','id')]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([

                     'name'=>['required','unique:animals,name'],
                     'description'=>'required',

        ]);


        if($request->hasFile('avatar')){

           $path = $request->file('avatar')
                           ->store('',['disk'=>'public_uploads']);


       }

        $animal=Animal::create([
                          'name'=>$request->name,
                          'description'=>$request->description,
                          'species'=>$request->has('species')?$request->species:'',
                          'url'=>($request->hasFile('avatar'))?url('/images//'.$path):''
           ]);
         $animal->dimensions()->attach($request->dimension_ids);

         return redirect(route('dashboard'))->with('message','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal, Request $request)
    {
        //
        // dd('here');

        ///dd(new AnimalResource($animal));

        //dd($animal->withCount('dimensions')->get());

        // dd($animal->load('posts')->posts()->paginate(5));
        return inertia('Animal/Show',['animal'=>new AnimalResource($animal),
                                    //    'posts'=>PostResource::collection(Post::where('animal_id',$animal->id)),

                           'posts'=>Post::where('animal_id',$animal->id)
                                                            ->when($request->input('search'),
                                                                                fn($q,$search)=>
                                                                                            ($q->where('dimension_id','like',$search.'%')
                                                                                                ->orWhere('type','like',$search.'%')
                                                                                                )
                                                                  )
                                                            ->paginate(5)
                                                            ->withQueryString()

                                     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        return inertia('Animal/Edit',['animal'=>new AnimalResource($animal) ,'dimensions'=>Dimension::all('name','id') ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //   dd($request->all());
        $path=null;
         $request->validate([

                     'name'=>['required','unique:animals,name,'.$animal->id],
                     'description'=>'required',

        ]);


        if($request->hasFile('avatar')){

           $path = $request->file('avatar')
                           ->store('',['disk'=>'public_uploads']);
           }
        if ($path){
                        $animal->update([
                                        'name'=>$request->name,
                                        'description'=>$request->description,
                                        'species'=>$request->has('species')?$request->species:'',
                                        'url'=>$path??url('/images//'.$path)
                        ]);
            }
           else{
            $animal->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'species'=>$request->has('species')?$request->species:'',
                // 'url'=>$path??url('/images//'.$path)
           ]);

           }
         return redirect(route('animals.show',$animal->id))->with('message','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */

     public function dimensionPostCreate(Request $request, Animal $animal, Dimension $dimension)
     {

        return inertia('Post/Create',['animal'=> new AnimalResource($animal),
                                      'dimension'=> new DimensionResource($dimension)   ]);

        //return the route to create an animal, dimension specific post

     }

     public function destroy(Animal $animal)
    {
       $animal->posts()->detach();
       $animal->delete();
       return redirect(route('dashboard'))->with('message','Item successfully deleted!');
    }
}
