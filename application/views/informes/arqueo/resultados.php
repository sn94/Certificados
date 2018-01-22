<div class="container" id="resultados-arqueo">
<?php
 $r=0;
 foreach($detalle as $it){
 ?>
 <dl class="row">
 <dt>N&deg;</dt> <dd><?= $r ?></dd>
 <dt>N&deg; comprobante</dt> <dd><?= $it['nrobol']?></dd>
 <dt>N&deg; certificado</dt><dd><?= $it['serie'].$it['nrocerti']?></dd>
  <dt>Fecha certificado</dt><dd><?= $it['fecha_bol']?></dd>
 <dt>Estado cobro</dt><dd> <?= $it['estado']?> </dd>
 <dt>Monto</dt><dd><?= $it['costo'] ?></dd>
 <dt>Nombres</dt><dd><?= $it['nombape']?></dd> 

 </dl>
 <?php
  $r++;  }
 ?>




<div class="row">
<div class="col col-md-4">Total cobrado: </div><div class="col col-md-4"> <?= $totales['Total'] ?></div>
</div><!-- end row --> 
<br />
 
 

 
<!-- RESUMEN COBROS -->
<div class="row bg-success border-bottom-0">
<div class="col">RESUMEN COBROS</div>
</div><!-- end row -->

<!-- header -->
<div class="row hidden-md-down bg-success border-top-0">
<div class="col-md-8">Estado</div><div class="col-md">Cantidad</div><div class="col-md">Monto</div>
</div><!-- end row -->
<br />
<div class="row">
<div class="col-12 col-md-8">
<div class="row">
<div class="col-12"><span style="text-decoration: underline;">BOLETAS COBRADAS</span></div>
<div class="col hidden-md-up"> <div class="row"> <div class="col-12"><?= $totales['Cant bol']?></div><div class="col-12"><?= $totales['Total']?></div></div></div>

</div>
</div><!-- end col -->


<div class="col-md hidden-md-down"><div class="col"><span><?= $totales['Cant bol']?></span></div>
</div><!-- end col -->


<div class="col-md hidden-md-down"><div class="col"><span><?= $totales['Total'] ?></span></div>
</div><!-- end col -->


</div><!-- end row -->





<div class="row">
<div class="col-12 col-md-8">
<div class="row">
<div class="col-12"><span style="text-decoration: underline;">BOLETAS EXONERADAS</span></div>
<div class="col hidden-md-up"> <div class="row"> <div class="col-12"><?= $totales['Cant bol exo']?></div><div class="col-12">0</div></div></div>

</div>
</div><!-- end col -->


<div class="col-md hidden-md-down"><div class="col"><span><?= $totales['Cant bol exo']?></span></div>
</div><!-- end col -->


<div class="col-md hidden-md-down"><div class="col"><span> 0 </span></div>
</div><!-- end col -->

</div><!-- end row -->




<div class="row">
<div class="col-12 col-md-8">
<div class="row">
<div class="col-12"><span style="text-decoration: underline;">BOLETAS ANULADAS</span></div>
<div class="col hidden-md-up"> <div class="row"> <div class="col-12"><?= $totales['Cant bol anu']?></div><div class="col-12">0</div></div></div>

</div>
</div><!-- end col -->

<div class="col-md hidden-md-down"><div class="col"><span><?=  $totales['Cant bol anu']?></span></div>
</div><!-- end col -->


<div class="col-md hidden-md-down"><div class="col"><span>0</span></div>
</div><!-- end col -->
</div><!-- end row -->
<br />
<div class="row"><div class="col-12 col-md-8 bg-success">TOTALES</div> 
<div class="col-6 col-md"><span class="hidden-md-up">Cant.: </span><?= ($totales['Cant bol']+$totales['Cant bol anu']+$totales['Cant bol exo']) ?></div>
<div class="col-6 col-md"><span class="hidden-md-up">Monto: </span><?= $totales['Total']?></div></div><!-- END ROW -->

 <!-- END RESUMEN COBROS -->


<br /> 

<div class="row bg-success border-bottom-0">
<div class="col">RESUMEN CERTIFICADOS</div>
</div><!-- end row-->
 
<div class="row hidden-md-down bg-success">
<div class="col-md-8">ESTADO</div><div class="col-md">CANTIDAD</div>
</div><!-- end row-->
<br />
<div class="row">
<div class="col-md-8">
<div class="row"><div class="col">EMITIDOS</div><div class="col hidden-md-up"><?= $totales['Cant certi']?></div></div> </div>
<div class="col-md hidden-md-down"><?= $totales['Cant certi']?></div>
</div><!-- end row-->
<!--      ********************          -->
<div class="row">
<div class="col-md-8">
<div class="row"><div class="col">ANULADOS</div><div class="col hidden-md-up"><?= $totales['Cant certi anu']?></div></div> </div>
<div class="col-md hidden-md-down"><?= $totales['Cant certi anu']?></div>
</div><!-- end row-->
<!--          ***********************      -->
<div class="row">
<div class="col-md-8">
<div class="row"><div class="col">REGULARIZADOS</div><div class="col hidden-md-up"><?= $totales['Cant certi reg']?></div></div> </div>
<div class="col-md hidden-md-down"><?= $totales['Cant certi reg']?></div>
</div><!-- end row-->

