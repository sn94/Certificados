<div class="container formulario"> 

 <h2>CONTROL DE CERTIFICADOS</h2>
           
          

<div class="container">
<form name="form-bus-circuns" method="get" class="form-inline">
<h3>Consulta de circunscripciones</h3>
   
<div class='form-group'>
<label for="txt-cod">C&oacute;digo:</label>
<input  type="text"  name="txt-cod" class="form-control"/>
</div>   

<div class='form-group'>
<label for="txt-cod">Descripci&oacute;n:</label>
<input  type="desc"  name="txt-desc" class="form-control"/>
</div>   
<button type="submit" class="btn btn-success">Buscar</button>
 
 </form><br />
   
<div class="container-fluid">
<!-- HEADER TABLE -->
<div class="row hidden-md-down thr" >
<div class="col th"><span>Certi. ini.</span></div>
<div class="col th"><span>Certi. fin.</span></div>
<div class="col th"><span>Fecha hab.</span></div>
<div class="col th"><span >Entregado a.</span></div>
<div class="col th"><span>Obs.</span></div> 
</div><!-- End row -->

<?php foreach( $datos as $it){ ?>
<!-- CONTENT  TABLE -->
<div class="row" >

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Certi. ini.</label></div>  <div class="col"><span><?= $it['certi_ini']?></span></div>
</div><!-- inner row -->
</div> <!-- End col -->

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Certi. fin.</label></div>  <div class="col"><span><?= $it['certi_fin']?></span></div>
</div><!-- inner row -->
</div> <!-- End col -->

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Fecha ent.</label></div>  <div class="col"><span><?= $it['fecha_ent']?></span></div>
</div><!-- inner row -->
</div> <!-- End col -->

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Entregado a</label></div>  <div class="col"><span><?= $it['entregado_a']?></span></div>
</div><!-- inner row -->
</div><!-- End col -->


<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Obs</label></div>  <div class="col"><span><?= $it['observa']?></span></div>
</div><!-- inner row -->
</div><!-- End col -->

 
</div><!-- End row -->

<?php } ?>
</div>

 


</div><!-- inner container -->





</div><!-- fin contenedor -->


<script>

$(document).ready(function(){
    
$("form[name=form-bus-circuns]").submit(function( ev){
    ev.preventDefault();
    var datos=  $(this).serializeArray();
    alert("Hola!");
});
   /********/ 
    
});


</script>