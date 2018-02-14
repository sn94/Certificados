<div class="container formulario">


<h2>Lista de Certificados</h2> 
<div class="container">
<br>
<form name="form-listado-cer" class="form-inline">
<label class="sr-only" for="txt-fecha-desde">Fecha inicial: </label>
<input placeholder="Fecha desde dd/MM/YYYY" type="text" name="txt-fecha-desde" class="form-control mb-2 mr-sm-2 mb-sm-0 sel-fecha" />

<label  class="sr-only"  for="txt-fecha-hasta">Fecha final: </label>
<input  placeholder="Fecha hasta dd/MM/YYYY" type="text" name="txt-fecha-hasta" class="form-control mb-2 mr-sm-2 mb-sm-0 sel-fecha" />


<div class="input-group mt-2">
<!-- **************** -->
<label  class="sr-only" for="txt-usuario">Usuario: </label>
<button type="button" class="btn btn-small btn-warning"><span class="fa fa-pencil"></span></button>
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="txt-usuario" placeholder="Nick de usuario">
<!-- **************** -->
</div>

 

<label  class="sr-only" >Nacionalidad: </label>
<input  placeholder="Nacionalidad"  type="text" name="txt-nacionalidad" class="form-control mb-2 mr-sm-2 mb-sm-0"  />

<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Anulados
    </label>
  </div>

<div class="btn-group">
  <button class="btn btn-success" type="submit">Buscar</button>
<button class="btn btn-danger" type="button">Salir</button> 
</div><!-- end row -->

</form>
</div>








<div class="container"  id="resultados-certi">

</div>



</div><!-- container -->


