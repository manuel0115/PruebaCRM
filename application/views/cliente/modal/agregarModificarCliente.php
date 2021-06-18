<style>
.bootstrap-tagsinput {
     width: 100%;
}
select{
     height: 35px !important;
}
</style>
<div class="modal-header">
    <h5 class="modal-title">Modal title</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form name="frmGuardarCliente" id="frmGuardarCliente">
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Nombre</label>
            <input class="form-control" type="text" value="<?php echo (isset($cliente))?$cliente[0]->NOMBRE:"";?>" id="nombre" name="nombre">
            <input class="form-control" type="hidden" value="<?php echo (isset($cliente))?$cliente[0]->ID_CLIENTE:"";?>" id="idCliente" name="idCliente">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Apellido</label>
            <input class="form-control" type="text" value="<?php echo (isset($cliente))?$cliente[0]->APELLIDO:"";?>" id="apellido" name="apellido">
        </div>
        <div class="form-group">
            <label class="col-form-label">Tipo</label>
            <select class="custom-select" name="tipo" id="tipo">
               <?php foreach($tipoCliente  as $value):?>
                 <option value="<?php echo $value->ID ?>"  <?php echo(isset($cliente) and ($value->ID == $cliente[0]->TIPO))?"selected":""?> ><?php echo $value->NOMBRE ?></option>
               <?php endforeach ?>>
            </select>
        </div>
        <div class="form-group" >
            <label for="example-text-input" class="col-form-label">Empresa</label>
            <input class="form-control" type="text" value="<?php echo (isset($cliente))?$cliente[0]->NOMBRE_EMPRESA:"";?>"  name="empresa" id="empresa">
        </div>
        <div class="form-group" >
            <label for="example-text-input" class="col-form-label">Direcciones</label>
            <input class="form-control" data-role="tagsinput" type="text" value="<?php echo (isset($cliente))?$cliente[0]->DIRECCIONES:"";?>"  name="direcciones" id="direcciones">
           
        </div>
        <div class="form-group" >
            <label for="example-text-input" class="col-form-label">Telefono</label>
            <input class="form-control" data-role="tagsinput" type="text" value="<?php echo (isset($cliente))?$cliente[0]->TELEFONO:"";?>"  name="telefonos" id="telefonos">
        </div>


        <div class="form-group" >
            <label for="example-text-input" class="col-form-label">Correo</label>
            <input class="form-control" type="text" value="<?php echo (isset($cliente))?$cliente[0]->CORREO:"";?>"  name="correo" id="correo">
        </div>
        <div class="form-group">
            <label class="col-form-label">Estado</label>
            <select class="custom-select" name="estado" id="estado">
            <?php 
                foreach($estado  as $value){
                
            ?>
                 <option value="<?php echo $value->ID ?>" <?php echo(isset($cliente) and ($value->ID == $cliente[0]->ESTADO))?"selected":""?> "><?php echo $value->NOMBRE ?></option>
               <?php } ?>>
            </select>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="guardarCliente">Guardar Cambios</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
</div>
<script>
  
</script>