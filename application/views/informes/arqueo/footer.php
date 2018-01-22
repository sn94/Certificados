<hr class="my-4"> 

<div class="container">
<div class="row">

<div class="col">
<div class="row">
<div class="col-12">
<div class="row"><div class="col">Firma</div> <div class="col"  style="border-bottom: 1px dotted rgb(88,88,88);" ></div> </div>
</div>

<div class="col-12" >
<div class="row"><div class="col">Aclaraci&oacute;n</div> <div class="col"  style="border-bottom: 1px dotted rgb(88,88,88);" ></div> </div>
</div>

<div class="col-12" >
<div class="row"><div class="col">Fecha hora</div> <div class="col"  style="border-bottom: 1px dotted rgb(88,88,88);" ></div> </div>
</div>

</div><!-- END ROW --> </div>

 <div class="col">
<div class="row">
<div class="col-12" >
<div class="row"><div class="col">Firma</div> <div class="col"  style="border-bottom: 1px dotted rgb(88,88,88);" ></div> </div>
</div>

<div class="col-12">
<div class="row"><div class="col">Aclaraci&oacute;n</div> <div class="col"  style="border-bottom: 1px dotted rgb(88,88,88);" ></div> </div>
</div>

<div class="col-12">
<div class="row"><div class="col">Fecha hora</div> <div class="col"  style="border-bottom: 1px dotted rgb(88,88,88);" ></div> </div>
</div>

</div><!-- END ROW --> </div>



</div><!-- firmas -->
</div>

<br />
<div class="container"  >
<hr class="my-4"> 
<div class="row">
<div class="col-12 col-md-3">Entregado por: </div><div class="col-12 col-md-3">***********</div>
<div class="col-12 col-md-3">Recib&iacute; conforme por: </div><div class="col-12 col-md-3">***********</div>
</div><!-- END ROW -->

<br />


</div><!-- end container -->



</div><!-- End container -->



</div> 
<!-- FIN ARQUEO resultados -->



<script type="text/javascript">

function GenerarPdf( accion){

}



$(document).ready(function(){

/***** FECHA SELECTOR  ******/
 
var objDate= {
	inline: true, dateFormat:"yy-mm-dd",
    dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
    dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
};
$("input[name=txtfecha]").datepicker( objDate );
/**********************************/

    $("form[name=form-arqueo-usu-dia]").submit(function(ev){
        ev.preventDefault();
        var fecha= $("input[name=txtfecha]").val();
        $.ajax({
            url:'<?= base_url()?>index.php/Consulta/arqueo_usu_diario',
            data:{'fecha':fecha},
            method:"get",
            success: function(data){  $( "#resultados-arqueo" ).html( data);},
            error: function (jqXHR, textStatus, errorThrown){
    $( "#resultados-arqueo"  ).html("<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Codigo: "+jqXHR.status+"</strong><br/><strong> Descr. Estado: "+textStatus+"</strong><br/><strong> Error: "+errorThrown+"</strong></div>");  
     }
        });
        
        
    });

});
</script>