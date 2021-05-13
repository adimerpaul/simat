<template>
  <div class="container">
      <h1>INMUEBLES DEL CONTRIBUYENTE</h1>
      <form action=""  @submit.prevent="buscar">
            <div class="form-group row  ">
                <label for="comun" class="form-label">CI (- comp)</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="comun" required v-model="dato2.comun">
                </div> -
                <div class="col-md-2">
                    <input type="text" class="form-control" id="complemento" v-model="dato2.complemento" style="text-transform:uppercase;">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-info" type="submit">Buscar</button> 
                </div>    
            </div>
      </form>
      <div class="form-group row">
            <label for="nomb" class="form-label">Nombre</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="nomb" readonly v-model="completo"><br>
            </div>
        </div>
              <div class="form-group row">
            <label for="direc" class="form-label">Direccion</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="direc" readonly v-model="direc"><br>
            </div>
        </div>
        <div id='lista' v-if="validar">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  id='reginmu'>  
            Nuevo
        </button>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">numero</th>
      <th scope="col">Cont</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Superficie</th>
      <th scope="col">Opcion</th>
    </tr>
  </thead>
  <tbody>
        <tr v-for="(i,index) in inm " :key="index">
            <td>{{i.cantidad}}</td>
            <td>{{i.flag_inmu}}</td>
            <td>{{i.descrip}}</td>
            <td>{{i.superficie}}</td>
            <td>
                    <button type="button" class="btn btn-primary" @click="recuperar(i.cantidad)" data-toggle="modal" data-target="#modinmu" >  
                        Mod
                    </button>
        </td>
        </tr>
  </tbody>
</table>
<hr>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Inmueble</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" @submit.prevent="registrar">
          <div class="row">
                <div class="col-md-4">
                    <label for="tipocont" class="form-label">TIPO</label>
                    <select class="form-control" id='tipocont'  v-model='dato.flaginmu' required> 
                        <option value="N" selected>NATURAL</option>
                        <option value="J">JURIDICA</option>
                        <option value="I">INDIVISA</option>
                    </select>
                    <input type="hidden" name="comun0" id="comun0" v-model='dato.comun' >
                    <input type="hidden" name="complemento0" id="complemento0" v-model='dato.complemento'>
                </div>
                <div class="col-md-4">
                    <label for="tipoinm" class="form-label">INMUEBLE</label>
                    <select class="form-control" id='tipoinm' required @change="cambio" v-model='dato.var1'>
                        <option value="1" selected>CASA</option>
                        <option value="2">LOTE</option>
                        <option value="3">DEPTO</option>
                        <option value="4">P. RURAL</option>
                    </select>
                </div>
            </div>
            <div class="row">
                
            <div class="col-md-4">
                <label for="zona" class="form-label">Zona</label>
                <select class="form-control" id='zona' required v-model="dato.zona">
                    <option v-for="z in zona" v-bind:value="z.zona" v-bind:key="z.zona">
                    {{z.descrip}}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="barrio" class="form-label">Barrio</label>
                <select class="form-control" id='barrio' required v-model="dato.codbarrio">
                    <option v-for="b in barrio " v-bind:value="b.codigo" v-bind:key="b.codigo">
                        {{b.barrio}}
                    </option>
                </select>
            </div>
        <div class="col-md-4">
            <label for="tipocalle" class="form-label">Tipo Calle</label>
            <select class="form-control" id='tipocalle' required v-model="dato.tipocalle">
                <option value="CA">CALLE</option>
                <option value="AV">AVENIDA</option>
                <option value="PL">PLAZA</option>
                <option value="PJ">PASAJE</option>
            </select>
        </div>
 
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="ncalle" class="form-label">Nombre Calle</label>
                <input type="text" class="form-control" id="ncalle" required v-model="dato.nombrecall" value='' style="text-transform:uppercase;">
            
            </div>           
            <div class="col-md-4">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero" required v-model="dato.numcasa" >
            
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="direccion" required v-model="dato.descrip" style="text-transform:uppercase;">
            </div>

        </div>

        <div class='row' id='areadept' style="display:none">
            <div class="col-md-4">
                <label for="bloque" class="form-label">bloque</label>
                <input type="text" class="form-control" id="bloque" value='' v-model="dato.bloque">
            </div>
            <div class="col-md-4">
                <label for="piso" class="form-label">piso</label>
                <input type="text" class="form-control" id="piso" value=''  v-model="dato.piso">
            </div>
            <div class="col-md-4">
                <label for="numdpto" class="form-label">numdpto</label>
                <input type="text" class="form-control" id="numdpto" value='' v-model="dato.numdpto">
            </div>
        </div>

        <div class='row'>
            <div class="col-md-2">
                <label for="distrito" class="form-label">Distrito</label>
                <input type="text" class="form-control" id="distrito" required v-model="dato.distrito" value='' maxlength="2">
            </div>
            <div class="col-md-2">
                <label for="manzano" class="form-label">manzano</label>
                <input type="text" class="form-control" id="manzano"  v-model="dato.manzano" value='' maxlength="2">
            </div>
            <div class="col-md-2">
                <label for="lote" class="form-label">lote</label>
                <input type="text" class="form-control" id="lote"  v-model="dato.lote" value='' maxlength="2">
            </div>
            <div class="col-md-2">
                <label for="sublote" class="form-label">sublote</label>
                <input type="text" class="form-control" id="sublote"  v-model="dato.sublote" value='' maxlength="2">
            </div>
            <div class="col-md-4">
                <label for="material" class="form-label">Material calle</label>
                <select class="form-control" id='material' required v-model="dato.matvias">
                    <option selected >Seleccionar</option>
                    <option value="1">ASFALTO</option>
                    <option value="2">ADOQUIN</option>
                    <option value="3">CEMENTO</option>
                    <option value="4">LOSETA</option>
                    <option value="4">PIEDRA</option>
                    <option value="5">RIPIO</option>
                    <option value="6">TIERRA</option>
                    <option value="7">LADRILLO</option>
                </select>
            </div>
        </div>
        <br>
        <div class="">
            <h5>Servicios</h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="luz" value="luz1" v-model="dato.luz" >
                <label class="form-check-label" for="luz">LUZ</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="agua" value="agua1" v-model="dato.agua" >
                <label class="form-check-label" for="agua">AGUA</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="alcant" value="alcant1" v-model="dato.alcantari" >
                <label class="form-check-label" for="alcant">ALCANTARILLADO</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="telefono" value="telefono1" v-model="dato.telefono" >
                <label class="form-check-label" for="telefono">TELEFONO</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="superf" class="form-label">superficie del terreno</label>
                <input type="number" step="0.01" min=0 class="form-control" id="superf" required v-model="dato.superficie" >
            </div>
            <div class="col-md-6">
                <label for="inclin" class="form-label">Inclinacion del terreno</label>
                <select name="" class="form-control" id="inclin" v-model="dato.inclinac">
                    <option value="1">DE 0 A 10</option>
                    <option value="2">DE 11 A 15</option>
                    <option value="3">MAYOR A 15</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="gestion" class="form-label">Gestion Cobro</label>
                <input type="number" class="form-control" id="gestion"  min=0 value=0 v-model="dato.gestion">
            </div>
        </div>
        <div class="row" id='areaconst'>
            <div class="col-md-12"><h5>Datos de Construccion</h5><hr></div>
            <div class="col-md-4">
                <label for="calidad" class="form-label">Calidad</label>
                <select class="form-control" id='calidad' v-model="dato.vivunifa">
                    <option value='' selected>Seleccionar</option>
                    <option value="1">LUJOSA</option>
                    <option value="2">MUY BUENA</option>
                    <option value="3">BUENA</option>
                    <option value="4">ECONOMICA</option>
                    <option value="5">INTERES SOCIAL</option>
                    <option value="6">MARGINAL</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="superterr" class="form-label">Superficie const</label>
                <input type="number" step="0.01" min=0 value=0 class="form-control" id="superterr"  v-model="dato.supconst">
            </div>
            <div class="col-md-4">
                <label for="antig" class="form-label">Antiguedad</label>
                <input type="number" class="form-control" id="antig"  min=0 value=0 v-model="dato.antconst">
            </div>


        </div>
<hr>
                <button type="submit" class="btn btn-primary" >Registrar</button>
      </form>
</div>

        
    </div>
  </div>
</div>



        </div>
<div class="modal fade bd-example-modal-lg" id="modinmu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">    
                <h5 class="modal-title" id="exampleModalLabel">Modificar de Inmueble</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" @submit.prevent="modificar">
                <div class="row">
                        <input type="hidden" name="modcantidad" id="modcantidad" v-model='modif.cantidad' required>
                    <div class="col-md-4">
                        <label for="modcomun" class="form-label">CI</label>
                        <input type="text" class="form-control" name="modcomun" id="modcomun" v-model='modif.comun' required>
                    </div>
   
                    <div class="col-md-4">
                        <label for="modtipocont" class="form-label">TIPO</label>
                        <select class="form-control" id='modtipocont'  v-model='modif.flaginmu' required> 
                            <option value="N" selected>NATURAL</option>
                            <option value="J">JURIDICA</option>
                            <option value="I">INDIVISA</option>
                        </select>
                        
                    </div>
                    <div class="col-md-4">
                            <label for="modtipoinm" class="form-label">INMUEBLE</label>
                            <select class="form-control" id='modtipoinm' required @change="cambio2" v-model='modif.var1'>
                                <option value="1" selected>CASA</option>
                                <option value="2">LOTE</option>
                                <option value="3">DEPTO</option>
                                <option value="4">P. RURAL</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="modzona" class="form-label">Zona</label>
                        <select class="form-control" id='modzona' required v-model="modif.zona">
                            <option v-for="z in zona" v-bind:value="z.zona" v-bind:key="z.zona">
                            {{z.descrip}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="modbarrio" class="form-label">Barrio</label>
                        <select class="form-control" id='modbarrio' required v-model="modif.codbarrio">
                            <option v-for="b in barrio " v-bind:value="b.codigo" v-bind:key="b.codigo">
                                {{b.barrio}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="modtipocalle" class="form-label">Tipo Calle</label>
                        <select class="form-control" id='modtipocalle' required v-model="modif.tipocalle">
                            <option value="CA">CALLE</option>
                            <option value="AV">AVENIDA</option>
                            <option value="PL">PLAZA</option>
                            <option value="PJ">PASAJE</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="modncalle" class="form-label">Nombre Calle</label>
                        <input type="text" class="form-control" id="modncalle" required v-model="modif.nombrecall" style="text-transform:uppercase;">
                    </div>           
                    <div class="col-md-4">
                        <label for="modnumero" class="form-label">Numero</label>
                        <input type="text" class="form-control" id="modnumero" required v-model="modif.numcasa" style="text-transform:uppercase;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="moddireccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="moddireccion" required v-model="modif.descrip"  style="text-transform:uppercase;">
                    </div>
                </div>
                <div class='row' id='areadept2' style="display:none">
                    <div class="col-md-4">
                        <label for="modbloque" class="form-label">bloque</label>
                        <input type="text" class="form-control" id="modbloque" value='' v-model="modif.bloque">
                    </div>
                    <div class="col-md-4">
                        <label for="modpiso" class="form-label">piso</label>
                        <input type="text" class="form-control" id="modpiso" value=''  v-model="modif.piso">
                    </div>
                    <div class="col-md-4">
                        <label for="modnumdpto" class="form-label">numdpto</label>
                        <input type="text" class="form-control" id="modnumdpto" value='' v-model="modif.numdpto">
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2">
                        <label for="moddistrito" class="form-label">Distrito</label>
                        <input type="text" class="form-control" id="moddistrito" required v-model="modif.distrito" value='' style="text-transform:uppercase;" maxlength="2">
                    </div>
                    <div class="col-md-2">
                        <label for="modmanzano" class="form-label">manzano</label>
                        <input type="text" class="form-control" id="modmanzano"  v-model="modif.manzano" value='' maxlength="2">
                    </div>
                    <div class="col-md-2">
                        <label for="modlote" class="form-label">lote</label>
                        <input type="text" class="form-control" id="modlote"  v-model="modif.lote" value='' maxlength="2">
                    </div>
                    <div class="col-md-2">
                        <label for="modsublote" class="form-label">sublote</label>
                        <input type="text" class="form-control" id="modsublote"  v-model="modif.sublote" value='' maxlength="2">
                    </div>
                    <div class="col-md-4">
                        <label for="modmaterial" class="form-label">Material calle</label>
                        <select class="form-control" id='modmaterial' required v-model="modif.matvias">
                            <option selected >Seleccionar</option>
                            <option value="1">ASFALTO</option>
                            <option value="2">ADOQUIN</option>
                            <option value="3">CEMENTO</option>
                            <option value="4">LOSETA</option>
                            <option value="4">PIEDRA</option>
                            <option value="5">RIPIO</option>
                            <option value="6">TIERRA</option>
                            <option value="7">LADRILLO</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="">
                    <h5>Servicios</h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="modluz" value="luz1" v-model="modif.luz" >
                        <label class="form-check-label" for="modluz">LUZ</label>
                    </div><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="modagua" value="agua1" v-model="modif.agua" >
                        <label class="form-check-label" for="modagua">AGUA</label>
                    </div><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="modalcant" value="alcant1" v-model="modif.alcantari" >
                        <label class="form-check-label" for="modalcant">ALCANTARILLADO</label>
                    </div><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="modtelefono" value="telefono1" v-model="modif.telefono" >
                        <label class="form-check-label" for="modtelefono">TELEFONO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="modsuperf" class="form-label">superficie del terreno</label>
                        <input type="number" step="0.01" min=0 class="form-control" id="modsuperf" required v-model="modif.superficie" >
                    </div>
                    <div class="col-md-6">
                        <label for="modinclin" class="form-label">Inclinacion del terreno</label>
                        <select name="" class="form-control" id="modinclin" v-model="modif.inclinac">
                            <option value="1">DE 0 A 10</option>
                            <option value="2">DE 11 A 15</option>
                            <option value="3">MAYOR A 15</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="modgestion" class="form-label">Gestion Cobro</label>
                        <input type="number" class="form-control" id="modgestion"  min=0 value=0 v-model="modif.gestion">
                    </div>
                </div>
                <div class="row" id='areaconst2'>
                    <div class="col-md-12"><h5>Datos de Construccion</h5><hr></div>
                    <div class="col-md-4">
                        <label for="modcalidad" class="form-label">Calidad</label>
                        <select class="form-control" id='modcalidad' v-model="modif.vivunifa">
                            <option value='' selected>Seleccionar</option>
                            <option value="1">LUJOSA</option>
                            <option value="2">MUY BUENA</option>
                            <option value="3">BUENA</option>
                            <option value="4">ECONOMICA</option>
                            <option value="5">INTERES SOCIAL</option>
                            <option value="6">MARGINAL</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="modsuperterr" class="form-label">Superficie const</label>
                        <input type="number" step="0.01" min=0 value=0 class="form-control" id="modsuperterr"  v-model="modif.supconst">
                    </div>
                    <div class="col-md-4">
                        <label for="modantig" class="form-label">Antiguedad</label>
                        <input type="number" class="form-control" id="modantig"  min=0 value=0 v-model="modif.antconst">
                    </div>

                </div>
                <hr>        
                    <button type="submit" class="btn btn-primary" id='modificar'>Modificar</button>
                </form>
            </div>
        </div>     
    </div>     
</div>
</div>
</template>

<script>
export default {
        data:function(){
            return {
                dato:{},
                modif:{},
                dato2:{},
                completo:'',
                direc:'',
                inm:[],
                barrio:[],
                ham:[],
                zona:[],
                validar:false,

            }
        },
        mounted() {
            // console.log('Component mounted.');
            $('#areadept').css("display","none");
            this.dato2.complemento="";
            axios.get('/cbarrio').then(res=>{
                this.barrio=res.data;
            });
            axios.get('/cham').then(res=>{
                this.ham=res.data;
            });
            axios.get('/zona').then(res=>{
                this.zona=res.data;
            });
            $('#areadept').css("display","none");
        },
        methods:{
            registrar(){
                this.dato.comun=this.dato2.comun;
                this.dato.complemento=this.dato2.complemento;
                console.log(this.dato);
                axios.post('/registrar',this.dato).then(res=>{
                  this.$fire({
                        title: "Guardado",
                        text: "Correctamente",
                        type: "success",
                        timer: 3000
                    })
                    this.dato={};
                    $('#exampleModal').modal('hide');
                    this.buscar();

                }).catch(e=>{
                    // console.log(e.response.data.message);
                    this.$fire({
                        title: "Error",
                        text: e.response.data.message,
                        type: "error",
                        // timer: 3000
                    })
                })                
            },
            validarcont(){
                axios.get('/validar/'+this.modif.comun+'/'+this.modif.complemento).then(res=>{
                    console.log(res.data > 0);
                    if(res.data > 0){
                        $('#modificar').prop('disabled',false);
                        this.validar=true;
                    }
                    else{
                        $('#modificar').prop('disabled',true);
                        this.validar=false;}
                    })
            },
            modificar(){
                console.log(this.modif);
                console.log(this.validar);
                if(this.validar){
                axios.put('/modificar/'+this.modif.cantidad,this.modif).then(res=>{
                  this.$fire({
                        title: "Guardado",
                        text: "Correctamente",
                        type: "success",
                        timer: 3000
                    })
                    this.inm={};
                    $('#modinmu').modal('hide');
                    this.buscar();
                }).catch(e=>{
                    // console.log(e.response.data.message);
                    this.$fire({
                        title: "Error",
                        text: e.response.data.message,
                        type: "error",
                        // timer: 3000
                    })
                })}
                else{
                    this.$fire({
                        title: "Error",
                        text: "El Contribuyente no esta Registrado",
                        type: "error",})
                }
                
            },

            buscar(){
                axios.get('/buscar/'+this.dato2.comun+'/'+this.dato2.complemento).then(res=>{
                    console.log(this.dato2);
                    console.log(res.data);
                    if(res.data.length!=0){
                        //this.dato=res.data[0];
                        this.dato.comun=res.data[0].comun;
                        console.log( $('#comun0').prop('value'));
                        this.completo=res.data[0].nombre+' '+res.data[0].paterno+' '+ res.data[0].materno;
                        this.direc=res.data[0].descrip;
                        this.validar=true;
                        this.listar();

                        }
                    else
                    {
                        this.completo='Contribuyente no Registrado';
                        this.direc='';
                        this.validar=false;
                        this.inm=[];
                    }
                })
            },

            cambio(){
                console.log($('#tipoinm').val());
                if(this.dato.var1==3)
                    $('#areadept').css("display","");
                else
                    $('#areadept').css("display","none");
                if(this.dato.var1!=2)
                    $('#areaconst').css("display","");
                else
                    $('#areaconst').css("display","none");                    
            },

            cambio2(){
                if(this.modif.var1==3)
                    $('#areadept2').css("display","");
                else
                    $('#areadept2').css("display","none");
                if(this.modif.var1!=2)
                    $('#areaconst2').css("display","");
                else
                    $('#areaconst2').css("display","none");                    
            },


            listar(){

                axios.get('/inm/'+this.dato2.comun+'/'+this.dato2.complemento).then(res=>{
                    console.log(res.data);
                    this.inm=res.data;
                })
            },
            recuperar($cc){
                    axios.get('/datoinm/'+$cc).then(res=>{
                        $('#modificar').prop('disabled',false);

                    console.log(res.data);
                    var info=res.data[0];
                    this.modif={'comun':info['comun']
                    ,'complemento':info['complemento']
                    ,'var1':info['var1'] 
                    ,'cantidad':info['cantidad']
                    ,'flaginmu':info['flag_inmu']
                    ,'codbarrio':info['cod_barrio']
                    ,'tipocalle':info['tipocalle']
                    ,'nombrecall':info['nombrecall']
                    ,'numcasa':info['numcasa']
                    ,'bloque': info['bloque']
                    ,'piso':info['piso']
                    ,'numdpto':info['numdpto']
                    ,'zona':info['zona']
                    ,'distrito':info['distrito']
                    ,'manzano':info['manzano']
                    ,'lote':info['lote']
                    ,'sublote':info['sublote'] 

                    ,'descrip':info['descrip']
                    ,'matvias':info['mat_vias']};

                    if (info['luz']=='S')
                        this.modif.luz=true;
                    else
                        this.modif.luz=false;
                    if(info['agua']=='S')
                        this.modif.agua=true;
                    else
                        this.modif.agua=false;
                    if(info['alcantari']=='S')
                        this.modif.alcantari=true;
                    else
                        this.modif.alcantari=false;
                    if(info['telefono']=='S')
                        this.modif.telefono=true;
                    else
                        this.modif.telefono=false;

                    this.modif.superficie=info['superficie'];
                    this.modif.inclinac=info['inclinac'];

                    this.modif.vivunifa=info['viv_unifa'];
                    this.modif.supconst=info['sup_const'];
                    this.modif.antconst=info['ant_const'];
                    this.modif.gestion=info['gestion'];
                    this.cambio2();

                }) 
            }
        
        }

        
}

</script>

<style>

</style>