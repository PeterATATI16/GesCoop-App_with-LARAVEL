<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Partenaire;
use App\Models\Realisation;
use DB;
use PDF;

class RealisationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires = Partenaire::All();
        $projets = Projet::All();
        $realisations = Realisation::orderBy("date_realisation","desc")->paginate(10);
        return view('realisations.index',compact('realisations','projets','partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $realisations = Realisation::All();
        $partenaires = Partenaire::All();
        $projets = Projet::where("statut",'=',"Réalisé")->get();
        return view('realisations.create',compact('realisations','partenaires','projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('realisations')->insert([
            'projet_id'=>$request->projet_id,
            'date_realisation'=>$request->date_realisation,
        ]);
        return back()->with('success','La réalisation a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Realisation $realisation)
    {
        $projets = Projet::All();
        return view('realisations.show',compact('realisation','projets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function totalRealisation()
    {
        
    }
    public function export_pdf(){
        $totalRealisation = DB::table('realisations')->count();
        if($totalRealisation != 0){
            $realisations = Realisation::all();
            $projets = Projet::all();
            $partenaires = Partenaire::all();
            $pdf = PDF::loadView('realisations.export', compact('realisations','projets','partenaires'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-realisations.pdf');
        }else{
            return back()->with('error',"Il n'existe aucun enregistrement pour cette table");
        }
    }
}
