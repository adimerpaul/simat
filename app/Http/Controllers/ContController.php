<?php

namespace App\Http\Controllers;

use App\Models\Cont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $d=new Cont();
        $d->act_inmu="";
        $d->act_vehi="";
        $d->act_acec="";
        $d->run="";
        $d->ruc="";
        $d->medidor="";
        $d->bloque="";
        $d->piso="";
        $d->numdpto="";
        $d->casilla="";
        $d->benemerito="";
        $d->car_benem="";
        $d->bandera="";
        $d->cod_caja="";
        $d->hora_reg="";


        $d->comun=$request->comun;
        $d->tipodocum=$request->tipodocum;
        $d->expedido=$request->expedido;
        $d->paterno=$request->paterno;
        $d->materno=$request->materno;
        $d->nombre=$request->nombre;
        $d->cod_ham=$request->cod_ham;
        $d->cod_barrio=$request->cod_barrio;
        $d->tipocalle=$request->tipocalle;
        $d->nombrecall=$request->nombrecall;
        $d->numcasa=$request->numcasa;
        $d->telefono=$request->telefono;
        $d->descrip=$request->descrip;
        $d->nacimient=$request->nacimient;
        $d->fecha_reg=now();
        $d->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cont  $cont
     * @return \Illuminate\Http\Response
     */
    public function show( $comun,$tipodocumen)
    {
        //
        $comun=$comun;
        $tipodocum=$tipodocumen;
        return Cont::where('comun',$comun)->where('tipodocum',$tipodocum)->get(); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cont  $cont
     * @return \Illuminate\Http\Response
     */
    public function edit(Cont $cont)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cont  $cont
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$comun1)
    {
        //
        $comun=$request->comun;
        $tipodocum=$request->tipodocum;
        //$cont=Cont::where('comun',$comun)->where('tipodocum',$tipodocum)->get();  

        $cont=array(
       
        'comun'=>$request->comun,
        'tipodocum'=>$request->tipodocum,
        'expedido'=>$request->expedido,
        'paterno'=>$request->paterno,
        'materno'=>$request->materno,
        'nombre'=>$request->nombre,
        'cod_ham'=>$request->cod_ham,
        'cod_barrio'=>$request->cod_barrio,
        'tipocalle'=>$request->tipocalle,
        'nombrecall'=>$request->nombrecall,
        'numcasa'=>$request->numcasa,
        'telefono'=>$request->telefono,
        'descrip'=>$request->descrip,
        'nacimient'=>$request->nacimient);
        DB::table('pm01cont')
        ->where('comun',$comun)
        ->where('tipodocum',$tipodocum)
        ->update($cont);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cont  $cont
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cont $cont)
    {
        //
    }

    public function buscarcont($comun){
        return Cont::where('comun',$comun)->get(); 

    }

    public function codbarrio(){
        return DB::table('pmbarrio')->select('barrio','codigo')->get();
    }
    public function codham(){
        return DB::table('pmcodham')->select('codigo','alcaldia')->orderByDesc('alcaldia')->get();
        
    }
    public function codzona(){
        return DB::table('pmzona')->select('zona','descrip')->get();
        
    }
}
