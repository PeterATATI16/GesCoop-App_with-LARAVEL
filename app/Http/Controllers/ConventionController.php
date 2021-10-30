<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Convention;
use App\Models\Partenaire;
use DB;
use PDF;

class ConventionController extends Controller
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
        $conventions = Convention::orderBy("partenaire_id","desc")->paginate(10);
        return view('conventions.index',compact('conventions','partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conventions = Convention::All();
        $partenaires = Partenaire::All();
        return view('conventions.create',compact('conventions','partenaires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Convention();
        $file = $request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $data->file=$filename;
        $data->partenaire_id=$request->partenaire_id;
        $data->domaines=$request->domaines;
        $data->objet=$request->objet;
        $data->type=$request->type;
        $data->date_sign=$request->date_sign;
        $data->validite=$request->validite;
        $data->perspectives=$request->perspectives;
        $data->statut=$request->statut;

        $data->save();
        return back()->with('success','La convention a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Convention $convention)
    {
        $partenaires = Partenaire::all();
        return view('conventions.show',compact('convention','partenaires'));
    }
    public function download(Request $request, $file)
    {
       return response()->download(public_path('assets/'.$file));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Convention $convention)
    {
        $partenaires = Partenaire::all();
        return view('conventions.edit',compact('convention','partenaires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Convention  $convention)
    {
       $convention->update([
            'partenaire_id'=>$request->partenaire_id,
            'domaines'=>$request->domaines,
            'objet'=>$request->objet,
            'type'=>$request->type,
            'date_sign'=>$request->date_sign,
            'validite'=>$request->validite,
            'statut'=>$request->statut,
            'perspectives'=>$request->perspectives,
        ]);
        return back()->with('success','La convention a bien été mise à jour');

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
        $totalConvention = DB::table('conventions')->count();
        if($totalConvention != 0){
            $conventions = Convention::all();
            $partenaires = Partenaire::all();
            $pdf = PDF::loadView('conventions.export', compact('conventions','partenaires'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('liste-conventions.pdf');
        }else{
            return back()->with('error',"Il n'existe aucun enregistrement pour cette table");
        }
    }

    public function search(Request $request)
    {
                // Condition de parsing sur la clé étrangere
                $search2 = $request->get('search');
                $searchname = $search2;
            $partenaires = Partenaire::all();
            $conventions = Convention::all();
            foreach($conventions as $convention){
                foreach($partenaires as $partenaire){
                    if($convention->partenaire_id == $partenaire->id && $search2 == $partenaire->nom){
                        $search2 = $convention->partenaire_id;
                        //    return $search2;
                    }
                }
            }
            $count = Convention::where('partenaire_id','LIKE','%'.$search2.'%')->count();
            if($search2 != ''){
                if($count != 0){
                    $conventions = Convention::orderBy("created_at","desc")->where('partenaire_id','LIKE','%'.$search2.'%')->paginate(10);
                    return view('conventions.search',compact('conventions','partenaires','search2','count','searchname'))
                    ->with('1',(request()->input('page',1) - 1) * 5);
                }else{
                    return back()->with('error',"Aucun résultat trouvé pour $search2 , vérifiez la casse");
                }
            }else{
                return back()->with('error',"Saisissez le nom du partenaire ");
            }               
    }

    
}
