
<template>
    <div class="container">
        <h1>Buscar y/ o actualizar contribuyente</h1>
        <form class="row g-3" @submit.prevent="cargar">
        <div class="col-md-4">
            <label for="tipodocum1" class="form-label">Tipo Documento</label>
            <select class="form-select form-control" id="tipodocum1"  required v-model='dato2.tipodocum'>
                <option value="1">CARNET IDENTIDAD</option>
                <option value="2">RUN</option>
                <option value="3">PASAPORTE</option>
                <option value="4">CI EXTR</option>
            </select>

        </div>
        <div class="col-md-4">
            <label for="comun1" class="form-label">N documento</label>
            <input type="text" class="form-control" id="comun1" required v-model='dato2.comun'>

        </div>
        <div class="col-md-2">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="complemento"  v-model='dato2.complemento' min="2" max="2" maxlength="2">

        </div>
        <br>



        <div class="col-12">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
        </form>

                        <form @submit.prevent="modificar">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="tipodocumento">Tipo documento</label>
                                    <!--                                    <input type="text" class="form-control" id="tipodocumento" placeholder="Tipo Documento">-->
                                    <select name="tipodocumento" id="tipodocumento" class="form-control" required v-model="dato.tipodocum" disabled>
                                        <option value="1">CARNET DE IDENTIDAD</option>
                                        <option value="2">RUN</option>
                                        <option value="3">PASAPORTE</option>
                                        <option value="4">CI EXTR</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ci">Carnet de identidad</label>
                                    <input type="text" class="form-control" id="ci" placeholder="Carnet de identidad" required v-model="dato.comun" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="complemento">complemento</label>
                                    <input type="text" class="form-control" id="complemento"  v-model="dato.complemento" readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="expedido">Expedido</label>
                                    <!--                                    <input type="text" class="form-control" id="expedido" placeholder="Tipo Documento">-->
                                    <select name="expedido" id="expedido" class="form-control" required v-model="dato.expedido">
                                        <option value="OR">ORURO</option>
                                        <option value="LP">LA PAZ</option>
                                        <option value="PT">POTOSI</option>
                                        <option value="PD">PANDO</option>
                                        <option value="BE">BENI</option>
                                        <option value="SC">SANTA CRUZ</option>
                                        <option value="TJ">TARIJA</option>
                                        <option value="CB">COCHABAMBA</option>
                                        <option value="CH">SUCRE</option>
                                        <option value="EX">EXTERNO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="bandera">Bandera</label>
                                    <input type="text" class="form-control" id="bandera"  v-model="dato.bandera" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="paterno">Paterno</label>
                                    <input type="text" class="form-control" id="paterno" placeholder="Paterno" v-model="dato.paterno" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="materno">Materno</label>
                                    <input type="text" class="form-control" id="materno" placeholder="Materno" v-model="dato.materno" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" v-model="dato.nombre" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="telefono">Celular</label>
                                    <input type="text" class="form-control" id="telefono" placeholder="Celular" v-model="dato.telefono" style="text-transform:uppercase;">
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
                                        <option v-for="f in barrio" v-bind:value="f.codigo" >
                                            {{f.barrio}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tipocalle">Tipo Calle</label>
                                    <select class="form-control" id='tipocalle' required v-model="dato.tipocalle">
                                        <option value="CA" >CALLE</option>
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
                                    <label for="numcasa">Num Casa</label>
                                    <input type="text" class="form-control" id="numcasa" placeholder="numcasa" v-model="dato.numcasa" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descrip">Direccion</label>
                                    <input type="text" class="form-control" id="descrip" placeholder="descrip" v-model="dato.descrip" style="text-transform:uppercase;">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nacimient">Fec Nacimiento</label>
                                    <input type="date" class="form-control" id="nacimient" placeholder="nacimient" v-model="dato.nacimient">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"  ><i class="fa fa-user-plus"></i>Modificar</button>
                        </form>

    </div>  
</template>

<script>
export default {
        data:function(){
            return {
                dato:{},
                dato2:{},
                barrio:[],
                ham:[],
            }
        },
        mounted() {
            this.dato2.complemento='';
            // console.log('Component mounted.');
            axios.get('/cbarrio').then(res=>{
                this.barrio=res.data;
            });
            axios.get('/cham').then(res=>{
                this.ham=res.data;
            });
        },
        methods:{
            cargar(){
                axios.get('/cont/'+this.dato2.tipodocum+'/'+this.dato2.comun+'/'+this.dato2.complemento).then(res=>{
                    console.log(res.data);
                    if(res.data.length==0)
                        this.dato={};
                    else{
                    this.dato=res.data[0];
                    this.dato.nacimient=res.data[0].nacimient.substr(0,10);
                        }
                })
            },
            modificar(){
                axios.post('/modifica/'+this.dato.comun,this.dato).then(res=>{
                    // console.log('Guardado correctamente');
                    this.$fire({
                        title: "Modidicado",
                        text: "Correctamente",
                        type: "success",
                        timer: 3000
                    })
                    this.dato={};
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

<style>

</style>