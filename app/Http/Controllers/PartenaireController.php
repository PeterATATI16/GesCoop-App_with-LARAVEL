<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
use DB;
use PDF;

class PartenaireController extends Controller
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
    public function index(Request $request)
    {
        $partenaires = Partenaire::orderBy("created_at","desc")->paginate(10);
        return view('partenaires.index',compact('partenaires'))
            ->with('1',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('partenaires')->insert([
            'nom'=>$request->nom,
            'pays'=>$request->pays,
            'adresse'=>$request->adresse,
        ]);
        return back()->with('success','Le partenaire a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $partenaire)
    {
        return view('partenaires.show',compact('partenaire'));
        // dd($partenaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenaire $partenaire)
    {
        return view('partenaires.edit',compact('partenaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Partenaire $partenaire)
    {
        $partenaire->update([
            'nom'=>$request->nom,
            'pays'=>$request->pays,
            'adresse'=>$request->adresse,
        ]);
        return back()->with('success','Modification(s) réussies');
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
    public function delete(Partenaire $partenaire)
    {
        $partenaire->delete();
    }
    
    public function search(Request $request){
        $search2 = $request->get('search');
        $count = Partenaire::where('pays','LIKE','%'.$search2.'%')->count();
        if($search2 != ''){
            if($count != 0){
                $partenaires = Partenaire::orderBy("created_at","desc")->where('pays','LIKE','%'.$search2.'%')->paginate(10);
                return view('partenaires.search',compact('partenaires','search2','count'))
                ->with('1',(request()->input('page',1) - 1) * 5);
            }else{
                return back()->with('error',"Aucun résultat trouvé pour $search2");
            }
        }else{
            return back()->with('error',"Saisissez le pays ");
        }
        
    }
    public function export_pdf(){
        $totalPartenaire = DB::table('partenaires')->count();
        if($totalPartenaire != 0){
            $partenaires = Partenaire::all();
            $pdf = PDF::loadView('partenaires.export', compact('partenaires'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-partenaires.pdf');
        }else{
            return back()->with('error',"Il n'existe aucun enregistrement pour cette table");
        }
    }
    public function export_pdf_search(Request $request){
        $search2 = $request->get('search');
        $totalPartenaire = DB::table('partenaires')->count();
        if($totalPartenaire != 0){
            $partenaires = Partenaire::orderBy("created_at","desc")->where('pays','LIKE','%'.$search2.'%')->paginate(10);
            $pdf = PDF::loadView('partenaires.export-search', compact('partenaires','search2'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-partenaires-recherchés.pdf');
        }else{
            return back()->with('error',"Il n'y a rien à exporter");
        }
    }
}
