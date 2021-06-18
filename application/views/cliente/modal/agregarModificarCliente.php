<?php
echo "<pre>";
print_r($cliente);
echo "</pre>";
?>

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
            <input class="form-control" type="text" value="" id="nombre" name="nombre">
            <input class="form-control" type="hidden" value="" id="idCliente" name="idCliente">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Apellido</label>
            <input class="form-control" type="text" value="" id="apellido" name="apellido">
        </div>
        <div class="form-group">
            <label class="col-form-label">Tipo</label>
            <select class="custom-select" name="tipo" id="tipo">
               <?php foreach($tipoCliente  as $value):?>
                 <option value="<?php echo $value->ID ?>"><?php echo $value->NOMBRE ?></option>
               <?php endforeach ?>>
            </select>
        </div>
        <div class="form-group" >
            <label for="example-text-input" class="col-form-label">Empresa</label>
            <input class="form-control" type="text" value=""  name="empresa" id="empresa">
        </div>
        <div class="form-group" >
            <label for="example-text-input" class="col-form-label">Correo</label>
            <input class="form-control" type="text" value=""  name="correo" id="correo">
        </div>
        <div class="form-group">
            <label class="col-form-label">Estado</label>
            <select class="custom-select" name="estado" id="estado">
            <?php foreach($estado  as $value):?>
                 <option value="<?php echo $value->ID ?>"><?php echo $value->NOMBRE ?></option>
               <?php endforeach ?>>
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