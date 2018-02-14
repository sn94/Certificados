
<table class="table table-responsive table-bordered table-striped">
<tr>
<td>N° Certificado</td>
<td>Fecha</td>
<td>Grabado por</td>
<td>Grabado el</td>
<td>Anulado por </td>
<td>Anulado el</td>
<td>Observación</td>
</tr>

<?php
foreach( $certis as $ce){
    ?>

<tr>
<td><?=  $ce['nrocert'] ?></td>
<td><?=  $ce['fecha_cert'] ?></td>
<td><?=  $ce['usucar'] ?></td>
<td><?=  $ce['fechacar'] ?></td>
<td><?=  $ce['usuanu'] ?></td>
<td><?=  $ce['fechaanu'] ?></td>
<td><?=  $ce['observa'] ?></td>
</tr>


<?php }

if( sizeof(  $certis )){
    ?>

<tr>
<td>*******</td>
<td>*******</td>
<td>*******</td>
<td>*******</td>
<td>*******</td>
<td>*******</td>
<td>*******</td>
</tr>


<?php
}
?>

</table>
 