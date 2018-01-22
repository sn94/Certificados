 	<!-- Nav -->
						<nav id="nav">
							<!--

								Prologue's nav expects links in one of two formats:

								1. Hash link (scrolls to a different section within the page)

								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

							-->
							<ul id="grupo-enlaces">
               
         <li><a href="<?= base_url();?>"  class="skel-layers-ignoreHref"><span class="icon fa-home">Inicio</span></a></li>

                 				       
           <li class="custom-dropdown"><a href="#" class="skel-layers-ignoreHref"><span class="icon fa-users">Personas</span></a>
          <ul class="content-dropdown">
		  <li><a href="#" enlace="<?=  base_url("index.php/Welcome/addPersona");?>" titulo="Agregar Persona" class="skel-layers-ignoreHref"><span class="icon fa-user">Agregar persona</span></a></li>
        	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/busPersona");?>" titulo="Consulta de datos personales"  class="skel-layers-ignoreHref"><span class="icon fa-th">Consultar</span></a></li>
          	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/modPersona");?>" titulo="Modificar datos"   class="skel-layers-ignoreHref"><span class="icon fa-th">Modificar datos pers.</span></a></li> 
        </ul>
         
         </li>
         
                                         
         <li class="custom-dropdown"><a href="#" class="skel-layers-ignoreHref"><span class="icon fa-book">Certificados/boletas</span></a>
          <ul class="content-dropdown">
          
            <li><a  href="#" enlace="<?=  base_url("index.php/Welcome/listaTemporalCi");?>" titulo="Lista CI. temporales con CI nuevo"  class="skel-layers-ignoreHref"><span class="icon fa-th">Lista de CI. temp. con CI. nuevo</span></a></li>
        	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/listaCircunscripcion");?>" titulo="Control de certificados"  class="skel-layers-ignoreHref"><span class="icon fa-th">Control de certificados</span></a></li>
          	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/anularBoletasCerti");?>" titulo="Bloquear cert./bolet."   class="skel-layers-ignoreHref"><span class="icon fa-th">Bloquear certifi./boletas</span></a></li>
            <li><a  href="#" enlace="<?=  base_url("index.php/Welcome/lugarExpedicion");?>" titulo="Lugar de expedici&oacuten" class="skel-layers-ignoreHref"><span class="icon fa-th">Lugar expedici&oacute;n</span></a></li>
        </ul>
         
         </li>
       
       
            <li class="custom-dropdown"><a href="#"  class="skel-layers-ignoreHref"><span class="icon fa-file-archive-o">Informes</span></a>
            <ul class="content-dropdown">
        	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/arqueo_usu_diario");?>" titulo="Arqueo usuario/diario" class="skel-layers-ignoreHref"><span class="icon fa-th">Arqueo usuario/diario</span></a></li>
          	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/arqueo_fecha");?>" titulo="Arqueo usuario/fecha" class="skel-layers-ignoreHref"><span class="icon fa-th">Arqueo usuario/fecha</span></a></li>
        	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/arqueo_general");?>" titulo="Arqueo general" class="skel-layers-ignoreHref"><span class="icon fa-th">Arqueo general</span></a></li>
             <li><a  href="#" enlace="<?=  base_url("index.php/Welcome/resumen_general");?>" titulo="Resumen cobros"   class="skel-layers-ignoreHref"><span class="icon fa-th">Resumen cobros</span></a></li>
          	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/lista_boletas");?>" titulo="Listado de boletas" class="skel-layers-ignoreHref"><span class="icon fa-th">Listado de boletas</span></a></li>
        	<li><a href="#" enlace="<?=  base_url("index.php/Welcome/lista_certifi");?>" titulo="Listado de certificados" class="skel-layers-ignoreHref"><span class="icon fa-th">Listado de certificados</span></a></li>
         <li><a href="#" enlace="<?=  base_url("index.php/Welcome/lista_boletas_anu");?>" titulo="Boletas anuladas" class="skel-layers-ignoreHref"><span class="icon fa-th">Boletas anuladas</span></a></li>
          	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/lista_certifi_anu");?>" titulo="Certificados anulados" class="skel-layers-ignoreHref"><span class="icon fa-th">Certificados anulados</span></a></li>
          	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/resumen_bol_fecha");?>" titulo="Resumen boletasxFecha" class="skel-layers-ignoreHref"><span class="icon fa-th">Resumen boletasxFecha</span></a></li>
        	<li><a  href="#" enlace="<?=  base_url("index.php/Welcome/resumen_certi_fecha");?>" titulo="Resumen certificados x fecha" class="skel-layers-ignoreHref"><span class="icon fa-th">Resumen certificados x fecha</span></a></li>

             <li><a href="#" enlace="<?=  base_url("index.php/Welcome/cantidad_certifi");?>" titulo="Cant. expedida. por nac." class="skel-layers-ignoreHref"><span class="icon fa-th">Cant. expedida. por nac.</span></a></li>
        </ul>
           </li>
       
	 </ul>
						</nav>
