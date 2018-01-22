<div class="container formulario">

<h2>Arqueo/usuario-diario</h2>
<a class="btn btn-warning" href="<?=base_url()?>index.php/GeneradorPdf/arqueo_usuario">PDF</a>
<!--resultados -->
<!-- footer -->
<br>
<div class="container">

<form class="form-inline" name="form-arqueo-usu-dia"  >
 
<div class="form-group">
    <label for="txtfecha">Fecha:</label>
    <input type="text" class="form-control mx-sm-3" name="txtfecha" value="<?= $detalle['fecha_bol']?>" />
</div>

<div class="form-group">
    <label for="txtusr">Usuario:</label>
    <input type="text" class="form-control mx-sm-3" readonly="true" value="<?= $this->nativesession->get('usr')  ?>"/> 
</div>

<div class="form-group">
<button type="submit" class="btn btn-success">Buscar</button>
</div>



</form> 
 <br />
 </div>



