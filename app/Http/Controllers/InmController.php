<?php

namespace App\Http\Controllers;

use App\Models\Inm;
use App\Models\Cont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

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
        $com=$request->comun;
        $num=DB::table('pm01inmu')->where('comun',$com)->count();
        $num++;
        $inmueble=new Inm();
        $inmueble->comun=$com;
        $inmueble->cantidad=$com.'0'.$num;
        $inmueble->flag_inmu=$request->flaginmu;
        $inmueble->gestion=date('Y');
        $inmueble->var1='0';
        $inmueble->cod_barrio=$request->codbarrio;
        $inmueble->tipocalle=$request->tipocalle;
        $inmueble->nombrecall=$request->nombrecall;
        if($request->numcasa==null)
            $variable='';
        else 
            $variable=$request->numcasa;
        $inmueble->numcasa=$variable;
        if($request->bloque==null)
            $variable='';
        else 
            $variable=$request->bloque;
        $inmueble->bloque=$variable;
        if($request->piso==null)
            $variable='';
        else 
            $variable=$request->piso;
        $inmueble->piso=$variable;
        if($request->numdpto==null)
            $variable='';
        else 
            $variable=$request->numdpto;
        $inmueble->numdpto=$variable;

        $inmueble->zona=$request->zona;
        $inmueble->distrito=$request->distrito;

        if($request->manzano==null)
            $variable='';
        else 
            $variable=$request->manzano;
        $inmueble->manzano=$variable;
        if($request->lote==null)
            $variable='';
        else 
            $variable=$request->lote;
        $inmueble->lote=$variable;
        if($request->sublote==null)
            $variable='';
        else 
            $variable=$request->sublote; 
        $inmueble->sublote=$variable;

        $inmueble->descrip=$request->descrip;
        $inmueble->mat_vias=$request->matvias;

        if ($request->luz)
            $inmueble->luz='S';
        else
            $inmueble->luz='N';
        if($request->agua)
            $inmueble->agua='S';
        else
            $inmueble->agua='N';
        if($request->alcantari)
            $inmueble->alcantari='S';
        else
            $inmueble->alcantari='N';
        if($request->telefono)
            $inmueble->telefono='S';
        else
            $inmueble->telefono='N';

        $inmueble->superficie=$request->superficie;
        $inmueble->inclinac=$request->inclinac;

        $inmueble->viv_unifa=$request->vivunifa;
        $inmueble->prop_horiz='';
        $inmueble->sup_const=$request->supconst;
        $inmueble->ant_const= date("Y",strtotime(date("Y")."- ".$request->antconst." year"));

        $inmueble->var2='0';
        $inmueble->deuda='0';
        $inmueble->var3='0';
        $inmueble->exento='0';
        $inmueble->revalor='0';
        $inmueble->cs_manz='';
        $inmueble->cs_lote='';
        $inmueble->cod_caja='SIMAT';
        $inmueble->bandera='0';
        $inmueble->valor_ha=0.00;
        $inmueble->fecha_reg=now();
        $inmueble->hora_reg=date('H:i:s');
        $inmueble->control='F';
        $inmueble->n_informe='';
        $inmueble->controlex='F';
        $inmueble->docex='';
        $inmueble->l07='F';
        $inmueble->l07terreno=0.00;
        $inmueble->l07constru=0.00;
        $inmueble->l080='F';
        $inmueble->l080terren=0.00;
        $inmueble->l080constr=0.00;
        $inmueble->save();

        $cont=DB::table('pm01cont')
        ->where('comun',$comun)
        ->update(['act_inmu'=>'A']);


    }

    /**
     * Display the specified resource.
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($comun)
    {
        return Inm::where('comun',$comun)->get(); 
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
    public function update(Request $request, $cantidad1)
    {
        $con=$request->cantidad;
        $inmueble=array(

        'comun'=>$request->comun,
        'flag_inmu'=>$request->flaginmu,
        'cod_barrio'=>$request->codbarrio,
        'tipocalle'=>$request->tipocalle,
        'nombrecall'=>$request->nombrecall);
        if($request->numcasa==null)
            $variable='';
        else 
            $variable=$request->numcasa;
        $inmueble['numcasa']=$variable;
        if($request->bloque==null)
            $variable='';
        else 
            $variable=$request->bloque;
        $inmueble['bloque']=$variable;
        if($request->piso==null)
            $variable='';
        else 
            $variable=$request->piso;
        $inmueble['piso']=$variable;
        if($request->numdpto==null)
            $variable='';
        else 
            $variable=$request->numdpto;
        $inmueble['numdpto']=$variable;
        $inmueble['zona']=$request->zona;
        $inmueble['distrito']=$request->distrito;

        if($request->manzano==null)
            $variable='';
        else 
            $variable=$request->manzano;
        $inmueble['manzano']=$variable;
        if($request->lote==null)
            $variable='';
        else 
            $variable=$request->lote;
        $inmueble['lote']=$variable;
        if($request->sublote==null)
            $variable='';
        else 
            $variable=$request->sublote; 
        $inmueble['sublote']=$variable;

        $inmueble['descrip']=$request->descrip;
        $inmueble['mat_vias']=$request->matvias;

        if ($request->luz)
            $inmueble['luz']='S';
        else
            $inmueble['luz']='N';
        if($request->agua)
            $inmueble['agua']='S';
        else
            $inmueble['agua']='N';
        if($request->alcantari)
            $inmueble['alcantari']='S';
        else
            $inmueble['alcantari']='N';
        if($request->telefono)
            $inmueble['telefono']='S';
        else
            $inmueble['telefono']='N';

        $inmueble['superficie']=$request->superficie;
        $inmueble['inclinac']=$request->inclinac;

        $inmueble['viv_unifa']=$request->vivunifa;
        $inmueble['sup_const']=$request->supconst;
        $inmueble['ant_const']= date("Y",strtotime(date("Y")."- ".$request->antconst." year"));
        $cont=DB::table('pm01inmu')
        ->where('cantidad',$con)
        ->update($inmueble);
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

    public function datoinm($cantidad){
        return Inm::where('cantidad',$cantidad)->get(); 

    }
}
