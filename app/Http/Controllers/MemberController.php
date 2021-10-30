<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposition;
use App\Models\Projet;
use App\Models\User;
use App\Models\Convention;
use App\Models\Partenaire;
use App\Models\Realisation;
use DB;
use PDF;

class MemberController extends Controller
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
        $propositions = Proposition::orderBy("created_at","asc")->paginate(10);
        return view('admins.propositions',compact('propositions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('propositions')->insert([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'libelle'=>$request->libelle,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
        ]);
        return back()->with('success','Votre suggestion a bien été soumis');
    }

    // Retours
    public function cooperations(){
        $partenaires = Partenaire::All();
        $conventions = Convention::where("statut",'=',"En cours")->OrderBy("date_sign","desc")->paginate(1);
        return view('users.cooperations.cooperations',compact('conventions','partenaires'))
        ->with('1',(request()->input('page',1) - 1) * 5);

    }
    public function projets(){
        $partenaires = Partenaire::All();
        $projets = Projet::where("statut",'=',"En cours")->paginate(1);
        return view('users.projets.projets',compact('projets','partenaires'))
        ->with('1',(request()->input('page',1) - 1) * 5);
        
    }
    public function realisations(){
        $projets = Projet::where("statut",'=',"Réalisé")->get();
        $realisations = Realisation::OrderBy("date_realisation","desc")->paginate(2);
        return view('users.realisations.realisations',compact('realisations','projets'));
    }
    public function list_propositions(){
        $props = Proposition::orderBy("created_at","asc")->paginate(10);
        return view('users.list-propositions',compact('props'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function delete(Proposition $proposition)
    {
        $proposition->delete();
    }
    public function delete_user(User $user)
    {        
            $user->delete();
    }
    public function search(Request $request){
        $search2 = $request->get('search');
        $count = Proposition::where('name','LIKE','%'.$search2.'%')->count();
        if($search2 != ''){
            $propositions = Proposition::orderBy("created_at","desc")->where('name','LIKE','%'.$search2.'%')->paginate(10);
            return view('admins.search',compact('propositions','search2','count'))
            ->with('1',(request()->input('page',1) - 1) * 5);
        }else{
            return back()->with('error',"Veuillez saisir le nom de la personne");
        }        
    }
    public function search_user(Request $request){
        $search2 = $request->get('search');
        $count = User::where('name','LIKE','%'.$search2.'%')->count();
        if($search2 != ''){
            if($count != 0){
                $users = User::orderBy("created_at","desc")->where('name','LIKE','%'.$search2.'%')->paginate(10);
                return view('admins.search-user',compact('users','search2','count'))
                ->with('1',(request()->input('page',1) - 1) * 5);
            }else{
                return back()->with('error',"Aucun résultat trouvé pour $search2");
            }
        }else{
            return back()->with('error',"Saisissez le nom ");
        }
        
    }

    public function export_pdf(){
        $totalPropositions = DB::table('propositions')->count();
        if($totalPropositions != 0){
            $propositions = Proposition::all();
            $pdf = PDF::loadView('admins.export', compact('propositions'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-propositions.pdf');
        }else{
            return back()->with('error',"Il n'existe aucun enregistrement pour cette table");
        }
    }
}
