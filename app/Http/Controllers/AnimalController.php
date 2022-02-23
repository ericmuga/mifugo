<?php

namespace App\Http\Controllers;

use App\Models\{Animal,Post};
use App\Http\Resources\{AnimalResource,PostResource};
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
        return inertia('Animal/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([

                     'name'=>['required','unique:animals,name'],
                     'description'=>'required',

        ]);

        $string='';

        if($request->hasFile('avatar')){
           $file = $request->file('avatar');
           $string=Str::slug(Carbon::now()->toDateTimeString(), '-');
           $path = $request->file('avatar')
                           ->store('',['disk'=>'public_uploads']);

           // if(!Storage::disk('public_uploads')->put($path,$request->file('avatar')));






       }

        Animal::create([
                          'name'=>$request->name,
                          'description'=>$request->description,
                          'species'=>$request->has('species')?$request->species:'',
                          'url'=>url('/images//'.$path)
           ]);
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
        //   dd('here');

        ///dd(new AnimalResource($animal));
        return inertia('Animal/Show',['animal'=>new AnimalResource(Animal::find($animal->id)),
                                       'posts'=>PostResource::collection($animal->posts()
                                                                                ->when($request->input('search'),fn($q,$search)=>($q->where('title','like',$search.'%')
                                                                                                                                    ->orWhere('dimension','like',$search.'%')
                                                                                                                                    ->orWhere('type','like',$search.'%')
                                                                                                                                    ))
                                                                                ->paginate(5)
                                                                                ->withQueryString()),
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
