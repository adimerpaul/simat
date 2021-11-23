<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <i class="fa fa-user-plus"></i>
                        Registro Contribuyente
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="guardar">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="tipodocumento">Tipo documento</label>
                                    <!--                                    <input type="text" class="form-control" id="tipodocumento" placeholder="Tipo Documento">-->
                                    <select name="tipodocumento" id="tipodocumento" class="form-control" required v-model="dato.tipodocum">
                                        <option value="1" selected>CARNET DE IDENTIDAD</option>
                                        <option value="2">RUN</option>
                                        <option value="3">PASAPORTE</option>
                                        <option value="4">CI EXTR</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ci">Carnet de identidad</label>
                                    <input type="text" class="form-control" id="ci" placeholder="Carnet de identidad" required v-model="dato.comun" style="text-transform:uppercase;"> 
                                </div> - 
                                <div class="form-group col-md-2">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" placeholder="XX" v-model="dato.complemento" style="text-transform:uppercase;" min="2" max="2" maxlength="2">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="expedido">Expedido</label>
                                    <!--                                    <input type="text" class="form-control" id="expedido" placeholder="Tipo Documento">-->
                                    <select name="expedido" id="expedido" class="form-control" required v-model="dato.expedido">
                                        <option value="OR" selected>ORURO</option>
                                        <option value="LP">LA PAZ</option>
                                        <option value="PT">POTOSI</option>
                                        <option value="PD">PANDO</option>
                                        <option value="BE">BENI</option>
                                        <option value="SC">SANTA CRUZ</option>
                                        <option value="TJ">TARIJA</option>
                                        <option value="CB">COCHABAMBA</option>
                                        <option value="CH">SUCRE</option>
                                        <option value="EX">CI EXTR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="paterno">Paterno</label>
                                    <input type="text" class="form-control" id="paterno" placeholder="Paterno" v-model="dato.paterno" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="materno">Materno</label>
                                    <input type="text" class="form-control" id="materno" placeholder="Materno" v-model="dato.materno" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre"  required v-model="dato.nombre" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="telefono">Celular</label>
                                    <input type="text" class="form-control" id="telefono" placeholder="Celular" requiered v-model="dato.telefono" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cod_ham">Cod Ham</label>
                                    <select  class="form-control" v-model="dato.cod_ham"  name="cod_ham" id="cod_ham" required>
                                        <option v-for="i in ham"  v-bind:value="i.codigo" >
                                            {{i.alcaldia}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cod_barrio">Cod Barrio</label>
                                    <select  class="form-control" v-model="dato.cod_barrio"  name="cod_barrio" id="cod_barrio" required>
                                        <option v-for="f in barrio" v-bind:value="f.codigo">
                                            {{f.barrio}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tipocalle">Tipo Calle</label>
                                    <select class="form-control" id='tipocalle' required v-model="dato.tipocalle">
                                        <option value="CA" selected>CALLE</option>
                                        <option value="AV">AVENIDA</option>
                                        <option value="PL">PLAZA</option>
                                        <option value="PJ">PASAJE</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="nombrecall">Nombre Calle</label>
                                    <input type="text" class="form-control" id="nombrecall" placeholder="nombrecall" v-model="dato.nombrecall" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="numcasa">Numero Casa</label>
                                    <input type="text" class="form-control" id="numcasa" placeholder="numcasa" v-model="dato.numcasa" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descrip">Direccion</label>
                                    <input type="text" class="form-control" id="descrip" placeholder="Domicilio" v-model="dato.descrip" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nacimient">Fec Nacimiento</label>
                                    <input type="date" class="form-control" id="nacimient" required placeholder="nacimient" v-model="dato.nacimient">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"  ><i class="fa fa-user-plus"></i>Registrar</button>
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
                parametros:{},
                barrio:[],
                ham:[],
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
        },
        methods:{
            guardar(){
                this.parametros=this.dato;
                    this.dato={};
                axios.post('/guardar',this.parametros).then(res=>{
                    // console.log('Guardado correctamente');
                    this.dato={};
                    this.parametros={};
                    this.$fire({
                        title: "Guardado",
                        text: "Correctamente",
                        type: "success",
                        timer: 3000
                    })
                }).catch(e=>{
                    // console.log(e.response.data.message);
                    this.$fire({
                        title: "Error",
                        text: e.response.data.message,
                        type: "error",
                        // timer: 3000
                    })
                })
            }
        }
        // mounted() {
        //     console.log('Component mounted.')
        // }
      
    }
 
</script>

