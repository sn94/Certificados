<div class="container formulario">


<h2>Lista de Certificados</h2> 
<div class="container">
<form name="form-listado-cer">

<div class="row">
<div class="col-12 col-md-auto">
<div class="row">
<div class="col-12 col-md-6">
<div class="form-group">
<label>Fecha inicial: </label><input type="text" name="txt-fecha-desde" class="form-control sel-fecha" />
</div>
</div> <!-- en col -->
<div class="col-12 col-md-6">
<div class="form-group">
<label>Fecha final: </label><input type="text" name="txt-fecha-hasta" class="form-control sel-fecha" />
</div>
</div><!-- en col -->

<div class="col-12 col-md-6">
<div class="form-group">
<label>Usuario: </label><input type="text" name="txt-usuario" class="form-control" />
</div>
</div><!-- en col -->

<div class="col-12 col-md-6">
<div class="form-group">
<label>Nacionalidad: </label><input type="text" name="txt-nacionalidad" class="form-control"  />
</div>
</div><!-- en col -->

</div>

</div><!-- inner row -->


<div class="col-12 col-md">
<div class="row">
<div class="col-12"><button class="btn btn-success w-75">Buscar</button></div>
<div class="col-12"><button class="btn btn-success w-75">Salir</button></div>
</div><!-- inner row -->
</div>

</div><!-- end row -->

</form>

</div>
</div><!-- container -->
 

<script type="text/javascript">
$(function(){
    
/***** FECHA SELECTOR  ******/
 
var objDate= {
	inline: true, dateFormat:"yy-mm-dd",
    dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
    dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
};
$(".sel-fecha").datepicker( objDate );
/**********************************/
 
     
 
 

$.getJSON("<?= $BaseUrl?>index.php/Consulta/nacionalidades", function(data){
    
 var nacions= [];
Object.keys(data).map(function(key ){nacions.push(  data[key].descrip);}
);

$("form[name=form-listado-cer] input[name=txt-nacionalidad]").autocomplete(
{ source: nacions }
);       });/** End JSON **/

 
    
});

</script>