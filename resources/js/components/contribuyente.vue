<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <i class="fa fa-user-plus"></i>
                        Contribuyente
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="guardar">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="tipodocumento">Tipo documento</label>
                                    <!--                                    <input type="text" class="form-control" id="tipodocumento" placeholder="Tipo Documento">-->
                                    <select name="tipodocumento" id="tipodocumento" class="form-control" required v-model="dato.tipodocum">
                                        <option value="1">Carnet identidad</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ci">Carnet de identidad</label>
                                    <input type="text" class="form-control" id="ci" placeholder="Carnet de identidad" required v-model="dato.comun">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="expedido">Expedido</label>
                                    <!--                                    <input type="text" class="form-control" id="expedido" placeholder="Tipo Documento">-->
                                    <select name="expedido" id="expedido" class="form-control" required v-model="dato.expedido">
                                        <option value="O">ORURO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="paterno">Paterno</label>
                                    <input type="text" class="form-control" id="paterno" placeholder="Paterno" v-model="dato.paterno">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="materno">Materno</label>
                                    <input type="text" class="form-control" id="materno" placeholder="Materno" v-model="dato.materno">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" v-model="dato.nombre">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="telefono">Celular</label>
                                    <input type="text" class="form-control" id="telefono" placeholder="Celular" v-model="dato.telefono">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cod_ham">cod_ham</label>
                                    <input type="text" class="form-control" id="cod_ham" placeholder="cod_ham" v-model="dato.cod_ham">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cod_barrio">cod_barrio</label>
                                    <input type="text" class="form-control" id="cod_barrio" placeholder="cod_barrio" v-model="dato.cod_barrio">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tipocalle">tipocalle</label>
                                    <input type="text" class="form-control" id="tipocalle" placeholder="tipocalle" v-model="dato.tipocalle">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="nombrecall">nombrecall</label>
                                    <input type="text" class="form-control" id="nombrecall" placeholder="nombrecall" v-model="dato.nombrecall">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="numcasa">numcasa</label>
                                    <input type="text" class="form-control" id="numcasa" placeholder="numcasa" v-model="dato.numcasa">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descrip">descrip</label>
                                    <input type="text" class="form-control" id="descrip" placeholder="descrip" v-model="dato.descrip">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nacimient">nacimient</label>
                                    <input type="date" class="form-control" id="nacimient" placeholder="nacimient" v-model="dato.nacimient">
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
                dato:{}
            }
        },
        methods:{
            guardar(){
                axios.post('/guardar',this.dato).then(res=>{
                    // console.log('Guardado correctamente');
                    this.$fire({
                        title: "Guardado",
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
