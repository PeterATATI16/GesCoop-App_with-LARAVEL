<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class SuperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function superUser(){
        $users = User::orderBy("created_at","desc")->where("role",'=',"super")->paginate(10);
        return view('super.super.index',compact('users'));
    }
    public function adminUser(){
        $users = User::orderBy("created_at","desc")->where("role",'=',"admin")->paginate(10);
        return view('super.admin.index',compact('users'));
    }
    public function memberUser(){
        $users = User::orderBy("created_at","desc")->where("role",'=',"membre")->paginate(10);
        return view('super.membres.index',compact('users'));
    }

    // Statut
    public function actifUser(){
        $users = User::orderBy("created_at","desc")->where("statut",'=',"actif")->paginate(10);
        return view('super.statut.actif',compact('users'));
    }
    public function inactifUser(){
        $users = User::orderBy("created_at","desc")->where("statut",'=',"inactif")->paginate(10);
        return view('super.statut.inactif',compact('users'));
    }
    public function edit(User $user)
    {
        return view('super.edit', compact('user'));
    }
    public function update(Request $request,User $user)
    {
        $user->update([           
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'statut'=>$request->statut,
        ]);
        return back()->with('success','Le statut de ce membre a été changé');
    }
    public function delete(User $user){
        $users = User::all();
        $userSuper = DB::table('users')->where("role",'=',"super")->count();
        if($userSuper >= 2){
            $user->delete();
        }else if($userSuper == 1){
            return back()->with('error',"Vous ne pouvez pas vous supprimer !");
        }else {
            foreach($users as $user){
                if($user->role != 'super'){            
                    $user->delete();
                }           
            }
        }
        
    }
    public function delete2(User $user2){
        $user2->delete();

    }
}
