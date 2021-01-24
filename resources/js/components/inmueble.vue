<template>
  <div class="container">
      <h1>INMUEBLES DEL CONTRIBUYENTE</h1>
        <form  >
        <div class="row">
            <div class="col-md-4">
                <label for="tipo" class="form-label">TIPO</label>
                <select class="form-control" id='tipo' required>
                    <option value="">Selecionar</option>
                    <option value="1">NATURAL</option>
                    <option value="2">JURIDICA</option>
                    <option value="3">INDIVISA</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="zona" class="form-label">Zona</label>
                <select class="form-control" id='zona' required>
                    <option selected>Seleccionar</option>
                    <option value="1">1A</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="barrio" class="form-label">Barrio</label>
                <select class="form-control" id='barrio' required>
                    <option selected>Seleccionar</option>
                    <option value="1">1A</option>
                </select>
            </div>
        </div>
        <div class="row">
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
        <div class="col-md-4">
            <label for="ncalle" class="form-label">Nombre Calle</label>
            <input type="text" class="form-control" id="ncalle" required>
        
        </div>

        </div>
        <div class="col-md-6">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" required>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>
    </form>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>