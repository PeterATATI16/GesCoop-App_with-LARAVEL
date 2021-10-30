<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisation;
use App\Models\User;
use Carbon\Carbon;
use DB;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function chartRealisation(){
        $year = ['2010','2011','2012','2013','2014','2015',
        '2016','2017','2018','2019','2020','2021','2022'
        ,'2023','2024','2025','2026','2027','2028','2029','2030'];
 
        $realisation = [];
        foreach ($year as $key => $value) {
            $realisation[] = Realisation::where(\DB::raw("DATE_FORMAT(date_realisation, '%Y')"),$value)->count();
        }
 
    	return view('statistiques.chartRealisation')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('realisation',json_encode($realisation,JSON_NUMERIC_CHECK));
    }

    public function chartUser(){
        $month = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $months = ['Jan','Fev','Mars','Avr','Mai','Juin','Juil','Aout','Sept','Oct','Nov','Dec'];
 
        $user = [];
        foreach ($month as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
        }
 
    	return view('statistiques.chartUser')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }
    public function chartUser_super(){
        $month = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $months = ['Jan','Fev','Mars','Avr','Mai','Juin','Juil','Aout','Sept','Oct','Nov','Dec'];
 
        $user = [];
        foreach ($month as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
        }
 
    	return view('super.stats')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }

}
