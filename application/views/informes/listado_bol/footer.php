
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
 
   $("form[name=form-arqueo-gen]").on("submit", function(evt){
       // se suprime la accion por defecto del evento que es el de refrescar la pagina
evt.preventDefault();
    // acciones personalizadas
    var datosForm= $(this).serialize();
    var objAjax= { 
        url: "<?= base_url().'index.php/'?>Consulta/lista_boletas",
        method: "POST",
        data: datosForm,
        success: function( data ){
        $("#resultados-boletas").html(  data  );
        }
    } ;
    $.ajax(    objAjax  );

 

   } );
    
    
});

</script>
 