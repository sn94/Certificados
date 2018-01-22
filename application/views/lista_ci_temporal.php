
<div class="container formulario"> 
 
 <h2>LISTA DE CI TEMPORALES CON CI NUEVO</h2>
 <h4>Cantidad: <?= $cantidad ?></h4>   
 <br />

<div class="container">
<!-- HEADER TABLE -->
<div class="row hidden-md-down thr">
<div class="col th"><span>CI. Temporal</span></div>
<div class="col th"><span>Nombres y Apell.</span></div>
<div class="col th"><span>Fecha de nac.</span></div>
<div class="col th"><span >CI. nuevo.</span></div>
<div class="col th"><span>Clave.</span></div>
<div class="col th"><span>Opci&oacute;n.</span></div>
</div><!-- End row -->
 <!-- CONTENT  TABLE -->
 
 <?php
foreach( $lista as $row){
    
 $fecha_nac =$row['fechanac'];
 $lug_nac=  $row['lugnac'];
 $nrodoc    =$row['nrodoc'];
 $ci_nuevo  =$row['ci_nuevo'];
 $nombres    =$row['nombre']." ".$row['apellido'];
 $docu_origen=$row['docu_origen'];
 $clave      =$row['clave'];

if ($fecha_nac=='1900-01-01'){ $fecha_nac='';
}else{ $fecha_nac=date("d-m-Y",strtotime($fecha_nac)); }
?>
<div class="row" >

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>CI. Temporal</label></div>  <div class="col"><span><?= $docu_origen ?></span></div>
</div><!-- inner row -->
</div> <!-- End col -->

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Nombres y apellidos</label></div>  <div class="col"><span><?= $nombres ?></span></div>
</div><!-- inner row -->
</div> <!-- End col -->

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Fecha/Lug. de nac.</label></div>  <div class="col"><span><?= $fecha_nac ?><br /><?= $lug_nac ?></span></div>
</div><!-- inner row -->
</div> <!-- End col -->

<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>CI. nuevo</label></div>  <div class="col"><span><?= $ci_nuevo ?></span></div>
</div><!-- inner row -->
</div><!-- End col -->


<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Clave</label></div>  <div class="col"><span><?= $clave ?></span></div>
</div><!-- inner row -->
</div><!-- End col -->


<div class="col-12 col-md">
<div class="row">
<div class="col hidden-md-up"><label>Opci&oacute;n</label></div>  
<div class="col">
	<a href = "delete_citemporal.php?nrodoc=<?=$nrodoc?>&ci_nuevo=<?=$ci_nuevo?>&docu_origen=<?=$docu_origen?>" ><img src="images/cedu_nueva.jpg" width="34" height="33" border="0" title="Transferir Cedula Temporal a Cedula Nueva"/></a>  
	<a href = "del_perso_repeti.php?nrodoc=<?=$nrodoc?>" ><img src="images/del_per_repe.png" width="23" height="28" border="0" title="Eliminar de Perso_Repeti"/></a>	 </div>
   
</div>
</div><!-- inner row -->
</div><!-- End col -->
</div><!-- End row -->

<?php  }?>
</div><!-- END TABLA -->




</div><!-- fin contenedor -->
