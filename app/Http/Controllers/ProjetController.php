<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Partenaire;
use DB;
use PDF;

class ProjetController extends Controller
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
        $projets = Projet::orderBy("date_initiation","desc")->paginate(10);
        return view('projets.index',compact('projets','partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::All();
        $partenaires = Partenaire::All();
        return view('projets.create',compact('projets','partenaires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('projets')->insert([
            'libelle'=>$request->libelle,
            'cout'=>$request->cout,
            'date_initiation'=>$request->date_initiation,
            'partenaire_id'=>$request->partenaire_id,
            'statut'=>$request->statut,

        ]);
        return back()->with('success','Le projet a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        $partenaires = Partenaire::All();
        return view('projets.show',compact('projet','partenaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        $partenaires = Partenaire::all();
        return view('projets.edit',compact('projet','partenaires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        $projet->update([
            'libelle'=>$request->libelle,
            'cout'=>$request->cout,
            'date_initiation'=>$request->date_initiation,
            'destination'=>$request->destination,
            'partenaire_id'=>$request->partenaire_id,
            'statut'=>$request->statut,
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
    public function export_pdf(){
        $totalProjet= DB::table('projets')->count();
        if($totalProjet != 0){
            $projets = Projet::all();
            $partenaires = Partenaire::all();
            $pdf = PDF::loadView('projets.export', compact('projets','partenaires'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-projets.pdf');
        }else{
            return back()->with('error',"Il n'existe aucun enregistrement pour cette table");
        }
    }
    public function delete(Projet $projet)
    {
        $projet->delete();
    }

    public function search(Request $request)
    {
                // Condition de parsing sur la clé étrangere
                $search2 = $request->get('search');
                $searchname = $search2;
            $partenaires = Partenaire::all();
            $projets = Projet::all();
            foreach($projets as $projet){
                foreach($partenaires as $partenaire){
                    if($projet->partenaire_id == $partenaire->id && $search2 == $partenaire->nom){
                        $search2 = $projet->partenaire_id;
                        //    return $search2;
                    }
                }
            }
            $count = Projet::where('partenaire_id','LIKE','%'.$search2.'%')->count();
            if($search2 != ''){
                if($count != 0){
                    $projets = Projet::orderBy("created_at","desc")->where('partenaire_id','LIKE','%'.$search2.'%')->paginate(10);
                    return view('projets.search',compact('projets','partenaires','search2','count','searchname'))
                    ->with('1',(request()->input('page',1) - 1) * 5);
                }else{
                    return back()->with('error',"Aucun résultat trouvé pour $search2 , vérifiez la casse");
                }
            }else{
                return back()->with('error',"Saisissez le nom du partenaire ");
            }               
    }

}
