<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Field};
use Illuminate\Routing\Route;
// use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //

    public function index ()
    {
        //display all users
    }

    public function create()
    {
        //show create form for a new user
        return inertia('Users/Create',['fields'=>Field::all('id','name'),
                                        'usertypes'=>[
                                                      ['id'=>1,'name'=>'Admin'],
                                                      ['id'=>2,'name'=>'Farmer'],
                                                      ['id'=>3,'name'=>'Agrovet'],
                                                      ['id'=>4,'name'=>'Doctor'],
                                                      ['id'=>5,'name'=>'Feed Distributor'],

                                                     ]
                                    ]);
    }

    public function store(Request $request)
    {
         dd($request->all());
        $request->validate([
                           'name'=>'required',
                           'email'=>['required','unique:users,email'],
                           'password'=>'required',
                           'type_id'=>'required',
                           'field_id'=>'required',
                           'phone'=>'required'
        ]);
        Auth::login(User::create($request->all()), $remember = true);


        return redirect(route('dashboard'))->with('message','Welcome!');
        //store the new users
    }

    public function show(Request $request,User $user){
        //show a users
    }

    public function edit (Request $request, User $user){

    }

    public function update(Request $request, User $user)
    {

    }

    public function destroy (User $user)
    {
        //delete a user
        $user->delete();
        return redirect(Route('users.index'))->with('message','User dropped successfully!');
    }
}
