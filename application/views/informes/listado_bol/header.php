<div class="container formulario">


<h2>Lista de boletas</h2>
<a class="btn btn-warning" href="<?=base_url()?>index.php/Pdfs/listado_boletas">PDF</a>

</br>  
<div class="container">


<form class="form-inline mt-3 mb-3" name="form-arqueo-gen">
 
 <div class="row">

 <div class="col-12 col-md-4"><input type="text" placeholder="Fecha desde" name="txt-fecha-desde" class="form-control  mb-2 mr-sm-2 mb-sm-0 sel-fecha" />
 </div>

 <div class="col-12 col-md-4"><input type="text" placeholder="Fecha hasta" name="txt-fecha-hasta" class="form-control  mb-2 mr-sm-2 mb-sm-0 sel-fecha" />
</div>

 <div class="col-12 col-md-4"><input type="text" placeholder="Usuario" name="txt-usuario" class="form-control  mb-2 mr-sm-2 mb-sm-0" />
 </div>
 
 </div>
 
  <!-- check anulados -->

<div class="form-check w-100">
<label class="form-check-label">
<input type="checkbox" name="bol-anulados" class="form-check-input" />Boletas anuladas
</label>
</div>

<div class="btn-group mt-2">
<button type="submit"  class="btn btn-success w-75" >Buscar</button>
<button type="button" class="btn btn-danger w-75">Salir</button>
</div> 
 
</form>

</div>


<div class="container"  id="resultados-boletas">
</div>