<?php
	/** Lic. Sonia Toledo **/


/** Errores relacionados con conexion y querying ****/


function mostrarError($objError){
?>
<div class="alert alert-danger">

<strong>C&oacute;digo de error -- </strong><?=$objError->getCode()  ?><br />
<strong>Modo de error --  </strong> <?= $objError->getMode() ?><br />
  <strong> Tipo de error -- </strong><?=$objError->getType() ?><br/>
    <strong>Mensaje de error -- </strong> <?=$objError->getMessage() ?> <br/>
    <strong>Pila de llamadas:</strong><br />
    <?=$objError->getCallback()  ?><br/>
    <strong>Informaci&oacute;n de depuraci&oacute;n</strong><br />
    <?= $objError->getDebugInfo() ?>
</div>
<?php      
}


function mostrarError_($objError, $sql){ ?>
  <div class="alert alert-danger">

<strong>C&oacute;digo de error -- </strong><?=$objError->getCode()  ?><br />
<strong>Modo de error --  </strong> <?= $objError->getMode() ?><br />
  <strong> Tipo de error -- </strong><?=$objError->getType() ?><br/>
    <strong>Mensaje de error -- </strong> <?=$objError->getMessage() ?> <br/>
    <strong>Pila de llamadas:</strong><br />
    <?=$objError->getCallback()  ?><br/>
    <strong>Informaci&oacute;n de depuraci&oacute;n</strong><br />
    <?= $objError->getDebugInfo() ?><br />
    <strong>Sentencia involucrada: </strong><br />
    <?= ( is_null($sql))? "Sentencia vacia" : $sql ?>
</div> 
 
<?php }  


/**  Vistas de los mensajes de error     **/
function mostrarError_Developer($TITULO, $MENSAJE){?>


<div class="alert alert-warning alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $TITULO?></strong> <?=$MENSAJE ?>
</div>
    
<?php }
?>