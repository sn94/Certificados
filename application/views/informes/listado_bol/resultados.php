 
<table class="table table-responsive table-stripped bg-success table-bordered" style="font-size: 12px;">
<tr>
  <th >Hora</th>
  <th  >Nro.Boletas</th>
  <th >Exon.</th>
  <th >Costo</th>
  <th >Anulado</th>
  <th  >Fecha de anu.</th>
  <th >Observaci&oacute;n</th>
  <th >Usurio anu.&nbsp;</th> 
</tr>
<?php
if( isset(  $listado)){
    if( sizeof( $listado) ){
        foreach( $listado as $ite){  ?>

<tr>
  <td >Hora</td>
  <td  >Nro.Boletas</td>
  <td >Exon.</td>
  <td >Costo</td>
  <td >Anulado</td>
  <td  >Fecha de anu.</td>
  <td >Observaci&oacute;n</td>
  <td >Usurio anu.&nbsp;</td> 
</tr>



<?php       } ?>


    </table>


<?php  }  }    ?>


 
