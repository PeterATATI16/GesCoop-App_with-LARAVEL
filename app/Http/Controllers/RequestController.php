<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Partenaire;
use App\Models\Realisation;
use App\Models\Mission;
use App\Models\Don;
use App\Models\Convention;
use App\Models\User;
use DB;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function request()
    {
        // Super user
        $role=Auth::user()->role;
        $statut=Auth::user()->statut;
        if($role == 'super'){
            if($statut=="actif"){
                $totalUser = DB::table('users')->count();
                $userSuper = DB::table('users')->where("role",'=',"super")->count();
                $userAdmin = DB::table('users')->where("role",'=',"admin")->count();
                $userMembre = DB::table('users')->where("role",'=',"membre")->count();
                // Statut
                $userActif = DB::table('users')->where("statut",'=',"actif")->count();
                $userInactif = DB::table('users')->where("statut",'=',"inactif")->count();
                // Output
                return view('super.dashboard.dashboard', compact('totalUser','userSuper',
                'userAdmin','userMembre','userActif','userInactif'));
            }else{
                return 'Votre compte a été désactivé';
            }          
        }
        /* Auths */
        $role=Auth::user()->role;
        $statut=Auth::user()->statut;
        if($role=='admin'){
            if($statut=="actif"){
                //users
            // partenaires
            $totalPartenaire = DB::table('partenaires')->count();
            // Conventions
            $totalConvention = DB::table('conventions')->count();
            $conv_encours = Convention::where("statut",'=',"En cours")->count();
            $conv_expiree = Convention::where("statut",'=',"Expirée")->count();
            // Dons
            $totalDon = DB::table('dons')->count();
            // Missions
            $totalMission = DB::table('missions')->count();
            $miss_enattente = Mission::where("statut",'=',"En attente")->count();
            $miss_encours = Mission::where("statut",'=',"En cours")->count();
            $miss_accomplie = Mission::where("statut",'=',"Accomplie")->count();
            // Projet
            $totalProjet = DB::table('projets')->count();
            $proj_enattente = Projet::where("statut",'=',"En attente")->count();
            $proj_encours = Projet::where("statut",'=',"En cours")->count();
            $proj_realise = Projet::where("statut",'=',"Réalisé")->count();
            // Realisations
            $totalRealisation = DB::table('realisations')->count();
            // Users
            $totalUser = DB::table('users')->where("role",'=',"membre")->count();
            // Suggestions
            $totalProp = DB::table('propositions')->count();
            // Returned
            return view('dashboard.dashboard',compact('totalPartenaire','totalDon',
            'totalMission','totalProjet','totalRealisation',
        'miss_enattente','miss_encours','miss_accomplie','proj_enattente','proj_encours',
                'proj_realise','totalUser','totalProp','totalConvention','conv_encours'
            ,'conv_expiree')); 

            }else{
                return 'Votre compte a été désactivé';
            }
                      
        }
        else{
            $statut=Auth::user()->statut;
            $name=Auth::user()->name;
            $lastname=Auth::user()->lastname;
            $email=Auth::user()->email;
            if($statut=="actif"){
                $totalProp = DB::table('propositions')->count();
             $conv_encours = Convention::where("statut",'=',"En cours")->count();
            $proj_encours = Projet::where("statut",'=',"En cours")->count();
            $totalRealisation = DB::table('realisations')->count();
            return view('users.dashboard', compact('totalProp','conv_encours','proj_encours','totalRealisation','name','lastname','email'));

            }else{
                return 'Votre compte a été désactivé';
            }
            
        }
    }
}
