<div class="alert alert-success alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
<strong>Operaci&oacute;n exitosa</strong> <?= $mensaje  ?> 
<a id="link-success-form" href="#" >Llenar otro formulario</a>
</div>

<script>
$("#link-success-form").click(function(){
    
    $("div#main").load("<?= base_url()?>index.php/<?= $SEGMENTOS ?>");
});
</script>