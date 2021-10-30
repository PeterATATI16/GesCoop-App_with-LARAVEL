<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Partenaire;
use DB;
use PDF;

class MissionController extends Controller
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
        $missions = Mission::orderBy("date_retour","desc")->paginate(10);
        return view('missions.index',compact('missions','partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $missions = Mission::All();
        $partenaires = Partenaire::All();
        return view('missions.create',compact('missions','partenaires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('missions')->insert([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'fonction'=>$request->fonction,
            'destination'=>$request->destination,
            'mode_transport'=>$request->mode_transport,
            'frais_transport'=>$request->frais_transport,
            'frais_sejour'=>$request->frais_sejour,
            'date_depart'=>$request->date_depart,
            'date_retour'=>$request->date_retour,
            'motif'=>$request->motif,
            'statut'=>$request->statut,
            'partenaire_id'=>$request->partenaire_id,
        ]);
        return back()->with('success','La mission a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        $partenaires = Partenaire::All();
        return view('missions.show',compact('mission','partenaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        $partenaires = Partenaire::all();
        return view('missions.edit',compact('mission','partenaires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $mission->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'fonction'=>$request->fonction,
            'destination'=>$request->destination,
            'mode_transport'=>$request->mode_transport,
            'frais_transport'=>$request->frais_transport,
            'frais_sejour'=>$request->frais_sejour,
            'date_depart'=>$request->date_depart,
            'date_retour'=>$request->date_retour,
            'motif'=>$request->motif,
            'statut'=>$request->statut,
            'partenaire_id'=>$request->partenaire_id,
        ]);
        return back()->with('success','Modifications réussies!');
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
    public function search(Request $request){
        $search2 = $request->get('search');
        $count = Mission::where('nom','LIKE','%'.$search2.'%')->count();
        if($search2 != ''){
            if($count != 0){
                $missions = Mission::orderBy("created_at","desc")->where('nom','LIKE','%'.$search2.'%')->paginate(10);
                return view('missions.search',compact('missions','search2','count'))
                ->with('1',(request()->input('page',1) - 1) * 5);
            }else{
                return back()->with('error',"Aucun résultat trouvé pour $search2");
            }
        }else{
            return back()->with('error',"Saisissez le nom ");
        }
        
    }
    public function export_pdf(){
        $totalMission = DB::table('missions')->count();
        if($totalMission != 0){
            $missions = Mission::all();
            $partenaires = Partenaire::all();
            $pdf = PDF::loadView('missions.export', compact('missions','partenaires'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-missions.pdf');
        }else{
            return back()->with('error',"Il n'existe aucun enregistrement pour cette table");
        }
    }
    public function delete(Mission $mission)
    {
        $mission->delete();
    }
}
