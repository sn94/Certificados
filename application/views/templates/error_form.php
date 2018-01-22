<div class="alert alert-danger alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
<strong>Operaci&oacute;n fallida</strong> <?= $mensaje  ?> 
<a id="link-danger-form" href="#" >Llenar otro formulario</a>
</div>

<script>
$("#link-danger-form").click(function(){
    
    $("div#main").load("<?= base_url()?>index.php/<?= $SEGMENTOS ?>");
});
</script>