<?php

namespace App\Http\Controllers;

use App\Models\Inm;
use Illuminate\Http\Request;

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
        
        $num=DB::table('pm01inmu')->count()->where('comun');
        $num++;
        $inmueble=new Inmu();
        $inmueble->comun=$request->comun;
        $inmueble->cantidad=$request->comun.'0'.$num;
        $inmueble->flag_inmu=$request->flag;
        $inmueble->gestion=date('Y');
        $inmueble->var1='0';
        $inmueble->cod_barrio=$request->codbarrio;
        $inmueble->tipocalle=$request->tipocalle;
        $inmueble->nombrecall=$request->nombrecall;
        $inmueble->numcasa=$request->numcasa;
        $inmueble->bloque='';
        $inmueble->piso='';
        $inmueble->numdpto='';
        $inmueble->zona=$request->zona;
        $inmueble->distrito=$request->distrito;
        $inmueble->manzano=$request->manzano;
        $inmueble->lote=$request->lote;
        $inmueble->sublote=$request->sublote;
        $inmueble->descrip=$request->descrp;
        $inmueble->mat_vias=$request->matvias;
        $inmueble->luz=$request->luz;
        $inmueble->agua=$request->agua;
        $inmueble->alcantari=$request->alcantari;
        $inmueble->telefono=$request->telefono;
        $inmueble->superficie=$request->superficie;
        $inmueble->inclinac=$request->inclinac;
        $inmueble->viv_unifa=$request->unifa;
        $inmueble->prop_horiz='';
        $inmueble->sup_const=$request->supconst;
        $inmueble->ant_const=$request->antconst;
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
        $inmueble->fecha_reg=date();
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
        DB::table('pm01inmu')->insert($inmueble);
        return true;
    }

    /**
     * Display the specified resource.
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
}
