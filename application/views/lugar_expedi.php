<div class="container formulario">


<h2>Lugar de expedici&oacute;n - INICERTI</h2>

<div class="container">

<div class="row"><div class="col-12"><button class="btn btn-info btn-small">Salir</button></div></div>
<br />

<table class="table table-responsive table-hover table-bordered table-striped table-inverse">
<thead>
<tr><th>Usuario</th><th>Lug. Exp.</th><th>Costo</th><th>Costo Desc.</th></tr>
</thead>
<tbody>
<?php  foreach( $lugar as $it){?>
<tr><td><?= $it['usuario']?></td><td><?= $it['lugexp']?></td><td><?= $it['costo']?></td><td><?= $it['costo_desc']?></td></tr>   
<?php } ?>
</tbody>
</table>

 
 
 


</div><!-- inner container -->


 



</div><!-- End Container -->