 <?php  
 if( sizeof( $listado) ){
   ?>


<table class="table table-responsive table-stripped bg-success table-bordered" style="font-size: 12px;">
<?php   $claves= array_keys( $listado[0]); ?>

<tr>
<?php  foreach($claves as $it){?>
  <th ><?=  $it  ?></th>
<?php  }  ?>
</tr> 



<?php
if( isset(  $listado)){
  if( sizeof( $listado) ){
    foreach( $listado as $ite){

      foreach($claves as $cla){?>

<tr> <td > <?=  $ite[  $cla] ?></td>    </tr>

<?php }    } ?>
</table>
<?php  }  }    ?>

<?php  }else{
  echo "NADA";
}  ?>


 
