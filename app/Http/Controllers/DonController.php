<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Don;
use App\Models\Partenaire;
use DB;
use PDF;

class DonController extends Controller
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
        $dons = Don::orderBy("partenaire_id","desc")->paginate(10);
        return view('dons.index',compact('dons','partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dons = Don::All();
        $partenaires = Partenaire::All();
        return view('dons.create',compact('dons','partenaires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('dons')->insert([
            'objet'=>$request->objet,
            'libelle'=>$request->libelle,
            'date'=>$request->date,
            'partenaire_id'=>$request->partenaire_id,
            'beneficiaire'=>$request->beneficiaire,

        ]);
        return back()->with('success','Le don a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Don $don)
    {
        $partenaires = Partenaire::All();
        return view('dons.show',compact('don','partenaires'));
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
    public function search(Request $request)
    {
                // Condition de parsing sur la clé étrangere
                $search2 = $request->get('search');
                $searchname = $search2;
            $partenaires = Partenaire::all();
            $dons = Don::all();
            foreach($dons as $don){
                foreach($partenaires as $partenaire){
                    if($don->partenaire_id == $partenaire->id && $search2 == $partenaire->nom){
                        $search2 = $don->partenaire_id;
                        //    return $search2;
                    }
                }
            }
            $count = Don::where('partenaire_id','LIKE','%'.$search2.'%')->count();
            if($search2 != ''){
                if($count != 0){
                    $dons = Don::orderBy("created_at","desc")->where('partenaire_id','LIKE','%'.$search2.'%')->paginate(10);
                    return view('dons.search',compact('dons','partenaires','search2','count','searchname'))
                    ->with('1',(request()->input('page',1) - 1) * 5);
                }else{
                    return back()->with('error',"Aucun résultat trouvé pour $search2 , vérifiez la casse");
                }
            }else{
                return back()->with('error',"Saisissez le nom du partenaire ");
            }               
    }

    public function export_pdf(){
        $totalDon = DB::table('dons')->count();
        if($totalDon != 0){
            $dons = Don::all();
            $partenaires = Partenaire::all();
            $pdf = PDF::loadView('dons.export', compact('dons','partenaires'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-dons.pdf');
        }else{
            return back()->with('error',"Il n'existe aucun enregistrement pour cette table");
        }
    }
}
