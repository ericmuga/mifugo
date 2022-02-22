<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnimalResource;
use Illuminate\Http\Request;
use App\Models\{Animal,Post,User};

class DashboardController extends Controller
{






    public function data(Request $request)
    {
        //animal count order by highest post
        $animals=AnimalResource::collection(Animal::query()
                                                    ->when($request->input('search'),fn($query,$search)=>($query->where('name','like',$search.'%')))
                                                    ->withCount('posts')
                                                    ->orderBy('posts_count','desc')
                                                    ->paginate(9)
                                                    ->withQueryString());


        return ['animals'=>$animals,'totalAnimals'=>Animal::count(),'totalPosts'=>Post::count()];
    }

    public function show(Request $request)
    {
     //  dd($this->data($request));
        return inertia('Dashboard/Admin',$this->data($request));
    }
}
