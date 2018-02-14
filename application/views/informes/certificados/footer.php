

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

 
    

$("form[name=form-listado-cer]").submit( function(evt){
    evt.preventDefault();
    $.ajax({

url: '<? base_url()?>index.php/Consulta/lista_certifi' ,
method: "post",
data: $( this).serialize(),
success: function(dat){
$("#resultados-certi").html(  dat );
}  });
});       });




  

</script>