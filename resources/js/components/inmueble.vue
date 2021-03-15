<template>
  <div class="container">
      <h1>INMUEBLES DEL CONTRIBUYENTE</h1>
      <form action=""  @submit.prevent="buscar">
            <div class="form-group row  ">
                <label for="comun" class="form-label">CI/RUN</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="comun" required v-model="dato2.comun">
                </div>
                <div class="col-md-5">
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
        <div id='lista'>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Nuevo
        </button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">numero</th>
      <th scope="col">Cont</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Superficie</th>
    </tr>
  </thead>
  <tbody>
        <tr v-for="(i,index) in inm " :key="index">
            <td>{{i.cantidad}}</td>
            <td>{{i.flag_inmu}}</td>
            <td>{{i.descrip}}</td>
            <td>{{i.superficie}}</td>
        </tr>
  </tbody>
</table>
<hr>
        </div>

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
          <div class="row">
                <div class="col-md-4">
                    <label for="tipocont" class="form-label">TIPO</label>
                    <select class="form-control" id='tipocont' required>
                        <option value="1" selected>NATURAL</option>
                        <option value="2">JURIDICA</option>
                        <option value="3">INDIVISA</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="tipoin" class="form-label">INMUEBLE</label>
                    <select class="form-control" id='tipoin' required>
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
                <select class="form-control" id='zona' required>
                    <option selected >Seleccionar</option>
                    <option v-for="z in zona" v-bind:value="z.zona">
                    {{z.descrip}}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="barrio" class="form-label">Barrio</label>
                <select class="form-control" id='barrio' required>
                    <option selected>Seleccionar</option>
                    <option v-for="b in barrio" v-bind:value="b.codigo">
                    {{b.barrio}}
                    </option>
                </select>
            </div>
        <div class="col-md-4">
            <label for="tipocalle" class="form-label">Tipo Calle</label>
            <select class="form-control" id='tipocalle' required>
                <option selected>Seleccionar</option>
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
                <input type="text" class="form-control" id="ncalle" required>
            
            </div>           
            <div class="col-md-4">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero" required>
            
            </div>
        </div>
        <div>
            <div class="col-md-12">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="direccion" required>
            </div>

        </div>

        <div class='row'>
            <div class="col-md-4">
                <label for="bloque" class="form-label">bloque</label>
                <input type="text" class="form-control" id="bloque" required>
            </div>
            <div class="col-md-4">
                <label for="bloque" class="form-label">bloque</label>
                <input type="text" class="form-control" id="bloque" required>
            </div>
            <div class="col-md-4">
                <label for="numdpto" class="form-label">numdpto</label>
                <input type="text" class="form-control" id="numdpto" required>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-2">
                <label for="distrito" class="form-label">Distrito</label>
                <input type="text" class="form-control" id="distrito" required>
            </div>
            <div class="col-md-2">
                <label for="manzano" class="form-label">manzano</label>
                <input type="text" class="form-control" id="manzano" required>
            </div>
            <div class="col-md-2">
                <label for="lote" class="form-label">lote</label>
                <input type="text" class="form-control" id="lote" required>
            </div>
            <div class="col-md-2">
                <label for="sublote" class="form-label">sublote</label>
                <input type="text" class="form-control" id="sublote" required>
            </div>
            <div class="col-md-4">
                <label for="material" class="form-label">Material calle</label>
                <select class="form-control" id='material' required>
                    <option selected>Seleccionar</option>
                    <option value="CA">ASFALTO</option>
                    <option value="AV">ADOQUIN</option>
                    <option value="PL">CEMENTO</option>
                    <option value="PJ">LOSETA</option>
                    <option value="PJ">PIEDRA</option>
                    <option value="PJ">RIPIO</option>
                    <option value="PJ">TIERRA</option>
                    <option value="PJ">LADRILLO</option>
                </select>
            </div>
        </div>
        <br>
        <div class="">
            <h5>Servicios</h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="luz" value="luz1">
                <label class="form-check-label" for="luz">LUZ</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="agua" value="agua1">
                <label class="form-check-label" for="agua">AGUA</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="alcant" value="alcant1">
                <label class="form-check-label" for="alcant">ALCANTARILLADO</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="telefono" value="telefono1">
                <label class="form-check-label" for="telefono">TELEFONO</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="superf" class="form-label">superficie del terreno</label>
                <input type="text" class="form-control" id="superf" required>
            </div>
            <div class="col-md-6">
                <label for="inclin" class="form-label">Inclinacion del terreno</label>
                <input type="text" class="form-control" id="inclin" required>
            </div>
        </div>
        <h5>Datos de Construccion</h5>
        <div class="row">
            <div class="col-md-4">
                <label for="calidad" class="form-label">Calidad</label>
                <select class="form-control" id='calidad' required>
                    <option selected>Seleccionar</option>
                    <option value="1">LUJOSA</option>
                    <option value="2">MUY BUENA</option>
                    <option value="3">BUENA</option>
                    <option value="4">ECONOMICA</option>
                    <option value="5">INTERES SOCIAL</option>
                    <option value="6">MARGINAL</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="superterr" class="form-label">Superficie</label>
                <input type="text" class="form-control" id="superterr" required>
            </div>
            <div class="col-md-4">
                <label for="antig" class="form-label">Antiguedad</label>
                <input type="number" class="form-control" id="antig" required min=0>
            </div>
        </div>
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        
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
                dato2:{},
                completo:'',
                direc:'',
                inm:[],
                barrio:[],
                ham:[],
                zona:[],
            }
        },
        mounted() {
            // console.log('Component mounted.');
            axios.get('/cbarrio').then(res=>{
                this.barrio=res.data;
            });
            axios.get('/cham').then(res=>{
                this.ham=res.data;
            });
            axios.get('/zona').then(res=>{
                this.zona=res.data;
            });
        },
        methods:{
            buscar(){
                axios.get('/buscar/'+this.dato2.comun).then(res=>{
                    console.log(res.data);
                    this.dato=res.data[0];
                    this.completo=res.data[0].nombre+' '+res.data[0].paterno+' '+ res.data[0].materno;
                    this.direc=res.data[0].descrip;
                    this.listar();
                })
            },

            listar(){
                axios.get('/inm/'+this.dato2.comun).then(res=>{
                    console.log(res.data);
                    this.inm=res.data;
                })
            }
        }
}
</script>

<style>

</style>