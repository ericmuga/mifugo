<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Resources\FieldResource;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->create($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function listArray(Request $request)
    {
       $key=$request->has('search')?$request->search:'';

        return    [
                   'title'=>'Professional Fields',
                   'search'=>$request->only(['search']),
                   'items'=>FieldResource::collection(Field::query()
                                ->when($request->input('search'),fn($query,$search)=>($query->where('description','like',$search.'%')
                                                                                            ->orWhere('name','like',$search.'%')

                                                                                            )
                                      )
                                ->orderBy('id')
                                ->paginate(5)
                                ->withQueryString())

                ];
    }

    public function create(Request $request)
    {
        return inertia('Fields/Create',$this->listArray($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','unique:fields,name'],
        ]);
        Field::create($request->all());
        return redirect()->back()->with('message','Field Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        //
        $field->delete();
        return redirect()->route('fields.index')->with('message','Record dropped successfully!');
    }
}
