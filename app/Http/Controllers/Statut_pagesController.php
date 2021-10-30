<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Partenaire;
use App\Models\Realisation;
use App\Models\Mission;
use App\Models\Don;
use App\Models\Convention;
use DB;

class Statut_pagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function conv_encours(){
        $conventions = Convention::where("statut",'=',"En cours")->paginate(10);
        return view('conventions.statut.en_cours',compact('conventions'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
    public function conv_expiree(){
        $conventions = Convention::where("statut",'=',"Expirée")->paginate(10);
        return view('conventions.statut.expiree',compact('conventions'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
    public function miss_en_attente(){
        $missions = Mission::where("statut",'=',"En attente")->paginate(10);
        return view('missions.statut.en_attente',compact('missions'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
    public function miss_encours(){
        $missions = Mission::where("statut",'=',"En cours")->paginate(10);
        return view('missions.statut.encours',compact('missions'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
    public function miss_accomplie(){
        $missions = Mission::where("statut",'=',"Accomplie")->paginate(10);
        return view('missions.statut.accomplie',compact('missions'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }

    public function pro_en_attente(){
        $projets = Projet::where("statut",'=',"En attente")->paginate(10);
        return view('projets.statut.en_attente',compact('projets'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
    public function pro_encours(){
        $projets = Projet::where("statut",'=',"En cours")->paginate(10);
        return view('projets.statut.encours',compact('projets'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
    public function pro_realise(){
        $projets = Projet::where("statut",'=',"Réalisé")->paginate(10);
        return view('projets.statut.realise',compact('projets'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
}
