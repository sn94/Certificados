<div class="container formulario">

<h2>Arqueo/usuario-diario</h2> 
<a class="btn btn-warning" href="<?=base_url()?>index.php/Pdfs/arqueo_usuario">PDF</a>

</br> 
</br> 

<form class="form-inline" name="form-arqueo-usu-dia"  >
  
    <label class="sr-only" for="txtfecha">Fecha:</label>
    <input type="text" class="form-control mx-sm-3" name="txtfecha" placeholder="FECHA" value="<?= $detalle['fecha_bol']?>" />
 
    <label class="sr-only" for="txtusr">Usuario:</label>
    <input type="text" class="form-control mx-sm-3" readonly="true" value="<?= $this->nativesession->get('usr')  ?>"/> 

<button type="submit" class="btn btn-success">Buscar</button>




</form> 
 <br /> 



