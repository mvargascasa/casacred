<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()    {    
        $this->middleware(function ($request, $next) {
            if (Auth::id()==123 || Auth::id()==147) return $next($request);
            else return redirect()->route('admin.index');
        });           
               
    }   
       
    public function index(){ 
        $users = User::where('status',1)->orderBy('email','asc')->get();
        return view('admin.users.index',compact('users'));
    }
       
    public function edit(User $user){ 
        return view('admin.users.edit',compact('user'));
    }
       
    public function update(Request $request, User $user){
        $user->fill($request->all());
        $user->save();
        return redirect()->route('users.index');
    }
    public function changepass(Request $request, User $user){
        $user->update(['password'=> Hash::make($request->password)]);
        return redirect()->back()->with('message','Contraseña actualizada');        
    }
}
