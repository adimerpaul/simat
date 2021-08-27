<template>
  <div class="container">
      <h1>INMUEBLES DEL CONTRIBUYENTE </h1>
      <form action=""  @submit.prevent="buscar">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" v-model="tipocontrib">
                <label class="form-check-label" for="flexSwitchCheckDefault">Juridico / Natural</label>
            </div>
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


    <table class="table">
  <thead>
    <tr>
      <th scope="col">hab</th>
      <th scope="col">numero</th>
      <th scope="col">Cont</th>
      <th scope="col">Gestion</th>
      <th scope="col">Cod Barrio</th>
      <th scope="col">Calle</th>
      <th scope="col">Bloque</th>
      <th scope="col">Piso</th>
      <th scope="col">Num Dept</th>
      <th scope="col">zona</th>
      <th scope="col">Distrito</th>
      <th scope="col">Manzano</th>
      <th scope="col">lote</th>
      <th scope="col">sublote</th>
      <th scope="col">Sup Const</th>
    </tr>
  </thead>
  <tbody>
        <tr v-for="(i,index) in inm " :key="index">
            <td>{{i.bandera}}</td>
            <td>{{i.cantidad}}</td>
            <td>{{i.flag_inmu}}</td>
            <td>{{i.gestion}}</td>
            <td>{{i.codbarrio}}</td>
            <td>{{i.nombrecall}}</td>
            <td>{{i.bloque}}</td>
            <td>{{i.piso}}</td>
            <td>{{i.numdpto}}</td>
            <td>{{i.zona}}</td>
            <td>{{i.distrito}}</td>
            <td>{{i.manzano}}</td>
            <td>{{i.lote}}</td>
            <td>{{i.sublote}}</td>
            <td>{{i.sup_const}}</td>
            <td>
        </td>
        </tr>
  </tbody>
</table>
<hr>


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
                bandera:0,
                msg:'',
                tipocontrib:1,

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
                    console.log(res);
                    //Preturn false;
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

 
            buscar(){
                console.log(this.tipocontrib);
                if( this.tipocontrib){
                axios.get('/buscar/J/'+this.dato2.comun+'/'+this.dato2.complemento).then(res=>{
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
                })}
                else{
                    axios.get('/buscar/N/'+this.dato2.comun+'/'+this.dato2.complemento).then(res=>{
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
                }
            },

            cambio(){
                console.log($('#tipoinm').val());
                if(this.dato.var1==3)
                    $('#areadept').css("display","");

                else
                    {$('#areadept').css("display","none");
                        this.dato.bloque='';
                        this.dato.piso='';
                        this.dato.numdpto='';
                    }
                if(this.dato.var1!=2)
                    {$('#areaconst').css("display","");
       
                    }
                else
                    {$('#areaconst').css("display","none");                  
                    this.dato.bloque='';
                    this.dato.piso='';
                    this.dato.numdpto='';
                    this.dato.vivunifa='';
                    this.dato.supconst=0;
                    this.dato.antconst='';
                    }
            },

            cambio2(){
                if(this.modif.var1==3)
                    {$('#areadept2').css("display","");
                        this.modif.bloque='';
                        this.modif.piso='';
                        this.modif.numdpto='';
                    }
                else
                    $('#areadept2').css("display","none");
                if(this.modif.var1!=2)
                    $('#areaconst2').css("display","");
                else
                    {$('#areaconst2').css("display","none");                    
                        this.modif.bloque='';
                        this.modif.piso='';
                        this.modif.numdpto='';
                        this.modif.vivunifa='';
                        this.modif.supconst=0;
                        this.modif.antconst='';
                    }
            },

            band(id,bandera){
                var band=0;
                if(bandera=='1')
                {this.msg='Seguro Desactivar inmu'; band=2;}
                else
                {this.msg='Seguro de Activar inmu'; band=1;}
                this.$confirm(this.msg,'Habilitar/Deshabilitar','warning').then(()=>
                {
                    axios.post('/bandera/'+id+'/'+band).then(res=>{
                        this.listar();
                        if(res.data=='0') this.$alert('No se puede Modificar');
                    })
                });
                
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
                    this.modif={
                    'CodAut':info['CodAut']
                    ,'comun':info['comun']
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
                    this.modif.CodAut=info['CodAut'];
                    console.log(this.modif);
                    this.cambio2();

                }) 
            }
        
        }

        
}

</script>

<style>

</style>