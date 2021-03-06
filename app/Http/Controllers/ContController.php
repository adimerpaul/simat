<?php

namespace App\Http\Controllers;

use App\Models\Cont;
use App\Models\ContJur;
use App\Models\Contj;
use App\Models\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function conjuridico(Request $request){
        if($request->complemento==null||$request->complemento=='')
            $cedula=$request->comun;
        else
            $cedula=$request->comun.'-'.strtoupper($request->complemento);

        if( ContJur::where('comun',$cedula)->count() == 0 ){
            $d=new ContJur;
            $d->act_inmu="";
            $d->act_vehi="";
            $d->act_acec="";
//            $d->run="";
            $d->rl_ruc=$request->rl_ruc;
            $d->medidor="";
            $d->bloque="";
            $d->piso="";
            $d->numdpto="";
            $d->casilla="";
                $d->rl_ci=$request->rl_ci;
                //            $d->benemerito="";
//            $d->car_benem="";
            $d->bandera="1";
            $d->cod_caja=Auth::user()->username;
            $d->hora_reg=date('H:i:s');
            $d->razon_soc=strtoupper($request->razon_soc);
            if($request->complemento==null||$request->complemento==''){
                $d->comun=$request->comun;
            }
            else{
                $d->comun=$request->comun.'-'.strtoupper($request->complemento);
            }
            $d->tipodocum=$request->tipodocum;
            $d->rl_expedi=$request->expedido;
            $d->paterno=strtoupper($request->paterno);
            $d->materno=strtoupper($request->materno);
            $d->nombre=strtoupper($request->nombre);
            $d->cod_ham=$request->cod_ham;
            $d->cod_barrio=$request->cod_barrio;
            $d->tipocalle=$request->tipocalle;
            $d->nombrecall=strtoupper($request->nombrecall);
            $d->numcasa=strtoupper($request->numcasa);
            $d->telefono=$request->telefono;
            $d->descrip=strtoupper($request->descrip);
//            $d->nacimient=$request->nacimient;
            $d->fecha_reg=now();
            $resultado=$d->save();

            if($resultado){
                $log=new Log();
                $log->actividad='Registro Contrib '.$d->comun;
                $log->iduser=Auth::user()->id;
                $log->nombre=Auth::user()->username;
                $log->save();
            }
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'CONTRIBUYENTE REGISTRADO',
            ], 422);

        };
    }
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
        if($request->complemento==null||$request->complemento=='')
            $cedula=$request->comun;
        else
            $cedula=$request->comun.'-'.strtoupper($request->complemento);

        if( Cont::where('comun',$cedula)->count() == 0 ){
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
        $d->bandera="1";
        $d->cod_caja=Auth::user()->username;
        $d->hora_reg="";

        if($request->complemento==null||$request->complemento=='')
        $d->comun=$request->comun;
        else
        $d->comun=$request->comun.'-'.strtoupper($request->complemento);
        $d->tipodocum=$request->tipodocum;
        $d->expedido=$request->expedido;
        $d->paterno=strtoupper($request->paterno);
        $d->materno=strtoupper($request->materno);
        $d->nombre=strtoupper($request->nombre);
        $d->cod_ham=$request->cod_ham;
        $d->cod_barrio=$request->cod_barrio;
        $d->tipocalle=$request->tipocalle;
        $d->nombrecall=strtoupper($request->nombrecall);
        $d->numcasa=strtoupper($request->numcasa);
        $d->telefono=$request->telefono;
        $d->descrip=strtoupper($request->descrip);
        $d->nacimient=$request->nacimient;
        $d->fecha_reg=now();
        $resultado=$d->save();

        if($resultado){
            $log=new Log();
            $log->actividad='Registro Contrib '.$d->comun;
            $log->iduser=Auth::user()->id;
            $log->nombre=Auth::user()->username;
            $log->save();
        }
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'CONTRIBUYENTE REGISTRADO',
            ], 422);

        };

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cont  $cont
     * @return \Illuminate\Http\Response
     */
    public function show($tipodocumen,$comun,$complemento=null)
    {
        //
        $tipodocum=$tipodocumen;
        if($complemento==null||$complemento=='')
            $bus=$comun;
        else
            $bus=$comun.'-'.$complemento;
            return Cont::where('comun',$bus)->where('tipodocum',$tipodocum)->get();

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

        'tipodocum'=>$request->tipodocum,
        'expedido'=>$request->expedido,
        'paterno'=>strtoupper($request->paterno),
        'materno'=>strtoupper($request->materno),
        'nombre'=>strtoupper($request->nombre),
        'cod_ham'=>$request->cod_ham,
        'cod_barrio'=>$request->cod_barrio,
        'tipocalle'=>$request->tipocalle,
        'nombrecall'=>strtoupper($request->nombrecall),
        'numcasa'=>strtoupper($request->numcasa),
        'telefono'=>$request->telefono,
        'descrip'=>strtoupper($request->descrip),
        'bandera'=>$request->bandera,
        'cod_caja'=>Auth::user()->username,
        'nacimient'=>$request->nacimient);

        $resultado=DB::table('pm01cont')
        ->where('comun',$comun)
        ->where('tipodocum',$tipodocum)
        ->update($cont);

        if($resultado){
            $log=new Log();
            $log->actividad='Modifica Contrib '.$request->comun;
            $log->iduser=Auth::user()->id;
            $log->nombre=Auth::user()->username;
            $log->save();
        }
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

    public function buscarcont($tipo,$comun,$complemento=null){
        $comun=$comun;
        $complemento=$complemento;//
        if($complemento==null || $complemento=='')
            $bus=$comun;
        else
            $bus=$comun.'-'.$complemento;
        if($tipo=='N')
           return Cont::where('comun',$bus)->get();
        if($tipo=='J')
           return ContJur::where('comun',$bus)->get();
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
