<div class="container formulario">


<h2>Resumen General</h2>

<div class="container">
<form name="form-arqueo-gen">

<div class="row">
<div class="col-12 col-md-auto">
<div class="row">
<div class="col-12 col-md">
<div class="form-group">
<label>Fecha desde: </label><input type="text" name="txt-fecha-desde" class="form-control sel-fecha" />
</div>
</div>
<div class="col-12 col-md">
<div class="form-group">
<label>Fecha hasta: </label><input type="text" name="txt-fecha-hasta" class="form-control sel-fecha" />
</div>
</div>
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
 
    
    
    
});

</script>
 