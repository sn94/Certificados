 <?
  session_start();
  error_reporting(0);

 //$codi  = $_REQUEST['codi'];
  $codi  = '100087630';
 $cod   = $codi;
// $accion= $_REQUEST['acc'];
 $accion= 'modi';
 $usua  =$_SESSION['usr'];
 $depend=$_SESSION['depend'];
 $orig  =$_SESSION['orig_datos'];
 $ip    =$_SESSION['ipi'];
 
if (empty($orig)){
      header("Location: login.php");
}
 ?>
 <?   
  ///---------------------------------------------------------------------------------------------------------- 
     include("conesis.php");
      $sper="select * from permisos where usuario='$usua' and sistema='Certificados'";
      $tveri = $mdb2->query($sper);
      if (PEAR::isError($tveri)) {
         die($tveri->getMessage());
      }  
      $rowcont=$tveri->numRows();
      
	  if ($rowcont==0){
          $msg = "No tiene autorizacion.";
	      header("Location: mensajes1.php?m=$msg");
	      exit();
      }
 
	 $o=0;
	 $vperd='';
	 $vperm='';
	 $vperv='';
     while ($rowveri=$tveri->fetchRow(MDB2_FETCHMODE_ASSOC)){
        $dat10=$rowveri['opciones'];
	    
	    if ($dat10=='mod_perso'){
	      $vperm=$dat10;
	    }
	    if ($dat10=='del_perso' ){
	       $vperd=$dat10;
	    } 
	    if ($dat10=='view_perso' ){
	       $vperv=$dat10;
	    } 

     }
     $mdb2->disconnect(); 
   
   	if (($accion=='eliminar') and ($vperd!='del_perso')){
         $msg = "No tiene autorizacion.";
	     header("Location: mensajes1.php?m=$msg");
	     exit();
    }
	if (($accion=='modi') and ($vperm!='mod_perso')){
         $msg = "No tiene autorizacion.";
	     header("Location: mensajes1.php?m=$msg");
	     exit();
    }
	if (($accion=='open') and ($vperv!='view_perso')){
         $msg = "No tiene autorizacion.";
	     header("Location: mensajes1.php?m=$msg");
	     exit();
    }
	//***********************************************************************************************************************************		 
			include"cone.php";
			if ($accion == 'del'){
		   		   $deshabilita = 'disabled="disabled"';   
				   $msg = '&nbsp;&nbsp;&nbsp;Eliminar Personas';
                 				 
 				   $sql = "select * from personas where nrodoc = '$codi'";
  				  
				   $res = $mdb2->query($sql);
				   if (PEAR::isError($res)) {
                         die($res->getMessage());
                   }  
 		           $row = $res->fetchRow(MDB2_FETCHMODE_ASSOC);
				   $codnac=$row['nacio'];
				   $codnac2=$row['nacio_orig'];
				   $codpro=$row['profesion'];
						  
						  // $fechagra=$row['fechagra'];
			               //$usuario=$row['usuario'];
						   //$horagra=$row['horagra'];   
				   $nac = "select * from nacio where idnacio!=$codnac order by descrip";
                   $rnac = $mdb2->query($nac);
				   if (PEAR::isError($rnac)) {
                        die($rnac->getMessage());
                   }  
				   $mnac = "select * from nacio where idnacio=$codnac"; 
				   $rmnac = $mdb2->query($mnac);
				   if (PEAR::isError($rmnac)) {
                        die($rmnac->getMessage());
                   }  
				   $mnacio = $rmnac->fetchRow(MDB2_FETCHMODE_ASSOC);
						   			 
				   $nac2 = "select * from nacio where idnacio!=$codnac2 order by descrip";
                   $rnac2 = $mdb2->query($nac2);
				   if (PEAR::isError($rnac2)) {
                        die($rnac2->getMessage());
                   }  
						    
				   $mnac2 = "select * from nacio where idnacio=$codnac2"; 
				   $rmnac2 = $mdb2->query($mnac2);
				   if (PEAR::isError($rmnac2)) {
                         die($rmnac2->getMessage());
                   }  
				   $mnacio2 = $rmnac2->fetchRow(MDB2_FETCHMODE_ASSOC);
				   $nacioc=$mnacio2['idnacio'];
				   $naciod=$mnacio2['descrip'];
						  
				   $pro = "select * from profesiones where idprofesiones!=$codpro order by descripcion";
                   $rpro= $mdb2->query($pro);
				   if (PEAR::isError($rpro)) {
                          die($rpro->getMessage());
                   }  
				   $mpro = "select * from profesiones where idprofesiones=$codpro"; 
				   $mprof = $mdb2->query($mpro);
				   if (PEAR::isError($mprof)) {
                      die($mprof->getMessage());
                   }  
				   $mprofe = $mprof->fetchRow(MDB2_FETCHMODE_ASSOC);
				   $profec=$mprofe['idprofesiones'];
				   $profed=$mprofe['descripcion'];
				   		$sql="select ruta,date(fechagra) as fecha_fot from imagenes.foto where cedula='$nrodoc' and tipo_ima=1 and subtipo_ima=9 order by fechagra desc limit 1";
 
	              $rsfot= $mdb2->query($sql);
        		  if (PEAR::isError($rsfot)) {
           				die($rsfot->getMessage());
        		  } 
				  $row_fot=$rsfot->fetchRow(MDB2_FETCHMODE_ASSOC); 
				  $ruta_fot=$row_fot['ruta'];
				  $fecha_fot=$row_fot['fecha_fot'];
				  $foto50=0;
						   
				   if ($row['tipodoc']=='CIP'){
				      $tdoc='CIP';
					  $tdoc1='CI.Provis.';
				   }
				   if ($row['tipodoc']=='PAS'){
				      $tdoc='PAS';
					  $tdoc1='Pasaporte';
				   }
				   if ($row['tipodoc']=='DNI'){
				      $tdoc='DNI';
					  $tdoc1='DNI';
				   }
				   if ($row['tipodoc']=='CEX'){
				      $tdoc='CEX';
					  $tdoc1='Cédula Extranj.';
				   }
						   //***********************************************
				   if ($row['estado_civil']=='SO'){
				      $tes='SO';
					  $tes1='Soltero';
				   }
				   if ($row['estado_civil']=='CA'){
				      $tes='CA';
					  $tes1='Casado';
				   }
				   if ($row['estado_civil']=='SE'){
				      $tes='SE';
					  $tes1='Separado';
				   }
				   if ($row['estado_civil']=='DI'){
				      $tes='DI';
					  $tes1='Divorciado';
				   }
				   if ($row['estado_civil']=='VI'){
				      $tes='VI';
					  $tes1='Viudo';
				   }
				   if ($row['estado_civil']=='ME'){
				      $tes='ME';
					  $tes1='Menor';
				   }
						//*********************************************	
				   $csex='';
				   $csex1='';
				   if ($row['sexo']=='M'){
				      $tsex='M';
					  $tsex1='M';
					  $csex='checked="checked"';
				   }
				   if ($row['sexo']=='F'){
				      $tsex='F';
					  $tsex1='F';
					  $csex1='checked="checked"';
				   }
			}
			
			 if ($accion == 'modi'){
				      					       
						   $deshabilita ="";
						   //$codi = $_REQUEST['codi'];
				     	   $msg = '&nbsp;&nbsp;&nbsp;Modificar Personas';
						   $per = "select * from personas where nrodoc = '$codi'";
					
						   $sper = $mdb2->query($per);
                           if (PEAR::isError($sper)) {
                               die($sper->getMessage());
                           }  
						   $row = $sper->fetchRow(MDB2_FETCHMODE_ASSOC);
                           $codnac=$row['nacio'];
						   $codnac2=$row['nacio_orig'];
						   $codpro=$row['profesion'];
						   $orig_datos=$row['orig_datos'];
						  
						   if ($orig_datos!='CERTI_EXTRA'){
						      header("Location: personas50.php");
						   
						   }
						   
						   if (empty($codnac2)){
							   $codnac2=0;
						   }
							
								 
						   $nac = "select * from nacio where idnacio!=$codnac order by descrip";
                           $rnac = $mdb2->query($nac);
						    if (PEAR::isError($rnac)) {
                               die($rnac->getMessage());
                           }  
						   $mnac = "select * from nacio where idnacio=$codnac"; 
				           $rmnac = $mdb2->query($mnac);
						    if (PEAR::isError($rmnac)) {
                               die($rmnac->getMessage());
                           }  
						   $mnacio = $rmnac->fetchRow(MDB2_FETCHMODE_ASSOC);
						   
						   					 
						   $nac2 = "select * from nacio where idnacio!=$codnac2 order by descrip";
                           $rnac2 = $mdb2->query($nac2);
						    if (PEAR::isError($rnac2)) {
                               die($rnac2->getMessage());
                           }  
						   $mnac2 = "select * from nacio where idnacio=$codnac2"; 
				           $rmnac2 = $mdb2->query($mnac2);
						    if (PEAR::isError($rmnac2)) {
                               die($rmnac2->getMessage());
                           }  
						   $mnacio2 = $rmnac2->fetchRow(MDB2_FETCHMODE_ASSOC);
						   $nacioc=$mnacio2['idnacio'];
						   $naciod=$mnacio2['descrip'];
						   
						   $pro = "select * from profesiones where idprofesiones!=$codpro order by descripcion";
                           $rpro= $mdb2->query($pro);
						    if (PEAR::isError($rpro)) {
                               die($rpro->getMessage());
                           }  
						   $mpro = "select * from profesiones where idprofesiones=$codpro"; 
				           $mprof = $mdb2->query($mpro);
						    if (PEAR::isError($mprof)) {
                               die($mprof->getMessage());
                           }  
						   $mprofe = $mprof->fetchRow(MDB2_FETCHMODE_ASSOC);
						   $profec=$mprofe['idprofesiones'];
						   $profed=$mprofe['descripcion'];
						  
						  	$sql="select id as id_foton,ruta,date(fechagra) as fecha_fot from imagenes.foto where cedula='$codi' and tipo_ima=1 and subtipo_ima=9 order by fechagra desc limit 1";
 
	              $rsfot= $mdb2->query($sql);
        		  if (PEAR::isError($rsfot)) {
           				die($rsfot->getMessage());
        		  } 
				  $row_fot=$rsfot->fetchRow(MDB2_FETCHMODE_ASSOC); 
				  $ruta_fot=$row_fot['ruta'];
				  $id_foton=$row_fot['id_foton'];
				  $fecha_fot=$row_fot['fecha_fot'];
				  $foto50=0;
				 
				  $ruta_fot='../archivos/'.$ruta_fot;		   
						   if ($row['tipodoc']=='CIP'){
						      $tdoc='CIP';
							  $tdoc1='CI.Provis.';
						   }
						   if ($row['tipodoc']=='PAS'){
						      $tdoc='PAS';
							  $tdoc1='Pasaporte';
						   }
						   if ($row['tipodoc']=='DNI'){
						      $tdoc='DNI';
							  $tdoc1='DNI';
						   }
						   if ($row['tipodoc']=='CEX'){
						      $tdoc='CEX';
							  $tdoc1='Cédula Extranj.';
						   }
						   if ($row['tipodoc']=='CAT'){
						      $tdoc='CAT';
							  $tdoc1='Carnet Adm.Tempo.';
						   }
						   if ($row['tipodoc']=='CAp'){
						      $tdoc='CAp';
							  $tdoc1='Carnet Adm.Perma.';
						   }
						   //***********************************************
						   if ($row['estado_civil']=='SO'){
						      $tes='SO';
							  $tes1='Soltero';
						   }
						   if ($row['estado_civil']=='CA'){
						      $tes='CA';
							  $tes1='Casado';
						   }
						   if ($row['estado_civil']=='SE'){
						      $tes='SE';
							  $tes1='Separado';
						   }
						   if ($row['estado_civil']=='DI'){
						      $tes='DI';
							  $tes1='Divorciado';
						   }
						   if ($row['estado_civil']=='VI'){
						      $tes='VI';
							  $tes1='Viudo';
						   }
						   if ($row['estado_civil']=='ME'){
						      $tes='ME';
							  $tes1='Menor';
						   }
						//*********************************************	
						$csex='';
						$csex1='';
						if ($row['sexo']=='M'){
						     $tsex='M';
						     $tsex1='M';
						     $csex='checked="checked"';
					   }
					   if ($row['sexo']=='F'){
					       $tsex='F';
					       $tsex1='F';
						   $csex1='checked="checked"';
					   }	
				 }	 
				 if ($accion == 'eliminar'){

					       //$id = $_REQUEST['cidcap'];
						   $deshabilita ="";
				     	   $msg = '&nbsp;&nbsp;&nbsp;Eliminar Personas';
			  
						   $fecha_accion= date("Y-m-d H:i");
						   
	$sql_up="insert into histo_personas select * from personas where nrodoc='$codi'";
	$res_up = $mdb2->exec($sql_up);
	 if (PEAR::isError($res_up)) {
		die($res_up->getMessage());
	} 

$sql_i="insert into historial (fecha_accion, usu_accion, depen_usua, ip, tipo_accion, tabla, nrodoc ) values ('$fecha_accion', '$usua', '$depend', '$ip', 'ELIMINA(CERTIF)', 'PERSONAS', '$codi')";
			   $res_i = $mdb2->exec($sql_i);
			   if (PEAR::isError($res_i)) {
					die($res_i->getMessage());
				} 


// *******************************Para enviar usuario de acción*********************************************
				           $stemp="update tempo set usua='$usua'";
				           $stemp1 = $mdb2->exec($stemp);
                           if (PEAR::isError($stemp1)) {
                               die($stemp1->getMessage());
                           }
 		 	               // *********************************************************************************************************
						   
						   $sql = "delete from personas where nrodoc = '$codi'";
					      
						   $res = $mdb2->exec($sql);
                           if (PEAR::isError($res)) {
                              die($res->getMessage());
                           }else{ ?>
                            <script language="javascript">
    					     document.location.href="carga_perso.php";
			        		</script>
							 <? 	
							}	   
				  } 
		                   
						  
                 $mdb2->disconnect();   
  	 
				?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

						
		
		<script language="javascript">
				function preguntaConfirmar(){ 
				 var sexo = document.form1.sexo.value;
				if (sexo == ''){
			 		   alert('Debe ingresar el Sexo');
			 		   return false;
			    }
				 if(confirm('Desea guardar esta modificacion ?'))
							    return true;
							 else
							    return false;
					}
		</script>
		<script language="javascript">
				function preguntaEliminar(){ 
				
				 if(confirm('Esta seguro que desea eliminar este registro ?'))
							    return true;
							 else
							    return false;
					}
		</script>
		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" src="v_fecha.js"></script>


<link href="css/estiloimenu.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo4 {color: #FF0000}
.style1 {
	font-size: 18px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style2 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: 14px;
}
.style11 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style17 {font-family: "Times New Roman", Times, serif; font-size: 12px; }
.style19 {font-family: "Times New Roman", Times, serif; font-size: 14px; }
-->
</style>
    <style>
          .thumb {
            height: 250px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>
</head>
<body>
<p align="center"><center>
</center></p>
<table width="925" border="0" align="center" cellpadding="8" cellspacing="4" bgcolor="#CCCCCC">
  
  <tr>
    <td width="901" bgcolor="#CECFCE"><table width="100%"  border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td width="42%" class="tituloGrande"><? //include"busca_ref.php"?></td>
          <td width="58%" align="right" class="tituloGrande"><a href="contenidos.php"></a></td>
        </tr>
    </table></td>
  </tr>
  
  <tr>
    <td height="527" align="center" bgcolor="#FFFFFF"><table width="98%"  border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td width="100%"><form name="form1" method="post" action="mod_persona_p.php" enctype="multipart/form-data">
            <table width="101%"  border="0" cellspacing="1" cellpadding="2">
              <!--DWLayoutTable-->
              
              <tr bgcolor="#FFFFFF">
                <td height="23" colspan="3" class="Estilo4"><span class="style1"><font color="#FF0000">
                 <? 
				  
				  //ESTO ES PARA MODIFICAR UN REGISTRO
				  include"cone.php";
				   if ($_POST['acc'] == 'modificar'){
				 
				 $tipodoc		=  $_POST['tipodoc'];
				 $nrodoc		=  $_POST['nrodoc'];
				 $cod		=  $_POST['nrodoc'];
				 $nombre		=   strtoupper($_POST['nombre']);
				 $apellido		=   strtoupper($_POST['apellido']);
				 $fechanac      =  $_POST['fechanac'];
				 $lugnac	 	=   strtoupper($_POST['lugnac']);
				 $nacio		 	=  $_POST['nacio'];
				 $nacio_orig 	=  $_POST['nacio2'];
				 $sexo		 	=  $_POST['sexo'];
				 $profe		 	=  $_POST['profe'];
				 $estadoc	 	=  $_POST['estadoc'];
				 $orig      	=  $_POST['orig_datos'];
				 
				 $domicilio	 	=   strtoupper($_POST['domicilio']);
				 $barrioc	 	=   strtoupper($_POST['barrioc']);
				 $telefono	 	=   strtoupper($_POST['telefono']);
				 $celular	 	=   strtoupper($_POST['celular']);
				 $padrec	 	=   strtoupper($_POST['padrec']);
				 $padren	 	=   strtoupper($_POST['padren']);
				 $padrea	 	=   strtoupper($_POST['padrea']);
				 $madrec	 	=   strtoupper($_POST['madrec']);
				 $madren	 	=   strtoupper($_POST['madren']);
				 $madrea	 	=   strtoupper($_POST['madrea']);
				 $conyuc	 	=   strtoupper($_POST['conyuc']);
				 $conyun	 	=   strtoupper($_POST['conyun']);
				 $conyua	 	=   strtoupper($_POST['conyua']);
				 $docu_orig	 	=   strtoupper($_POST['docu_orig']);
			
				 $nombre=addslashes($nombre);
				 $apellido=addslashes($apellido);
				 $lugnac=addslashes($lugnac);
				 $domicilio=addslashes($domicilio);
				 $barrioc=addslashes($barrioc);
				 $padren=addslashes($padren); 
				 $padrea=addslashes($padrea); 
				 $madren=addslashes($madren); 
				 $madrea=addslashes($madrea); 
                 $conyun=addslashes($conyun); 
				 $conyua=addslashes($conyua);
			  // obtenemos los datos del archivo -------------------------
			    $sql = "select nextval('imagenes.foto_ci_id_seq'::regclass) as nfot";
                 $rfo = $mdb2->query($sql);
				 if (PEAR::isError($rfo)) {
                         die($rfo->getMessage());
                 } 
				 $rwfo=$rfo->fetchRow(MDB2_FETCHMODE_ASSOC);
				 $nfot=$rwfo['nfot'];
				  
				 $ruta= "../archivos";
                 $imagen=$_FILES['files']['tmp_name'];
				 $nomimagen=$_FILES['files']['name'];//nombre
				 $tamano = $_FILES["files"]['size'];
                 $tipo = $_FILES["files"]['type'];
                    
				 $fp=fopen($imagen,'rb'); //abrimos el archivo binario "imagen" en modo lectura
                 $contenido=fread($fp,$tamano);//lee el archivo hasta el tamaño de la imagen
                // $contenido=addslashes($contenido);//Añadimos caracteres de escape
                 fclose($fp); //cerramos el archivo
	               
				 $destino =   $ruta."/".$nrodoc.'_'.$nfot.".jpeg"; //.'_'.$archivo; // 
                   $foto=$nrodoc.'_'.$nfot.".jpeg";
						
			//-----------------------------------------------------					 
				$hoy         = date("Y/m/d H:i:s");
				$fecha_accion= date("Y-m-d H:i");
				$hoy_actua   = date("Y/m/d");
	          	$usua        =$_SESSION['usr'];
				//$orig=$_SESSION['orig_datos'];
				$depend      =$_SESSION['depend'];
				
				
				if (empty($nacio)){
				        $nacio=0;
			         }
				if (empty($nacio_orig)){
				        $nacio_orig=0;
			         }
				if (empty($profe)){
				        $profe=0;
			     }
					
		$sql_up="insert into histo_personas select * from personas where nrodoc='$cod'";
	 
	$res_up = $mdb2->exec($sql_up);
	 if (PEAR::isError($res_up)) {
		die($res_up->getMessage());
	} 
		
$sql_i="insert into historial (fecha_accion, usu_accion, depen_usua, ip, tipo_accion, tabla, nrodoc ) values ('$fecha_accion', '$usua', '$depend', '$ip', 'MODIFICA(CERTIF)', 'PERSONAS', '$cod')";
			   $res_i = $mdb2->exec($sql_i);
			   if (PEAR::isError($res_i)) {
					die($res_i->getMessage());
				} 
			 
				
				// *******************************Para enviar usuario de acción*********************************************
				           $stemp="update tempo set usua='$usua'";
				           $stemp1 = $mdb2->exec($stemp);
                           if (PEAR::isError($stemp1)) {
                               die($stemp1->getMessage());
                           }
 		 	               // *********************************************************************************************************
				if (empty($fechanac)){
				 $sql= "update personas set nrodoc = "."'$cod'"."
				 ,tipodoc = "."'$tipodoc'"."
				 ,nombre = "."'$nombre'"."
				 ,apellido = "."'$apellido'"."
				 ,fechanac ="."NULL"." 
				 ,lugnac = "."'$lugnac'"."
				 ,nacio = "."$nacio"."
				 ,nacio_orig = "."$nacio_orig"."
				 ,sexo = "."'$sexo'"."
				 ,profesion = "."$profe"."
				 ,estado_civil = "."'$estadoc'"."
				 ,domicilio = "."'$domicilio'"."
				 ,barrio_ciudad = "."'$barrioc'"."
				 ,telefono = "."'$telefono'"."
				 ,celular = "."'$celular'"."
				 ,padre_cedul = "."'$padrec'"."
				 ,padre_nombre = "."'$padren'"."
				 ,padre_apelli = "."'$padrea'"."
				 ,madre_cedul = "."'$madrec'"."
				 ,madre_nombre = "."'$madren'"."
				 ,madre_apelli = "."'$madrea'"."
				 ,conyu_cedul = "."'$conyuc'"."
				 ,conyu_nombre = "."'$conyun'"."
				 ,conyu_apelli = "."'$conyua'"."
				 ,orig_datos = "."'$orig'"."
				 ,docu_origen = "."'$docu_orig'"."
				 ,fechagra = "."'$hoy'"."
				 ,usuario = "."'$usua'"." 
				 ,depend_carga = "."'$depend'"."
			
				  where nrodoc = '$nrodoc'";
			 
				 }else{
				 $sql= "update personas set nrodoc = "."'$nrodoc'"."
				 ,tipodoc = "."'$tipodoc'"."
				 ,nombre = "."'$nombre'"."
				 ,apellido = "."'$apellido'"."
				 ,fechanac ="." '$fechanac'"." 
				 ,lugnac = "."'$lugnac'"."
				 ,nacio = "."$nacio"."
				 ,nacio_orig = "."$nacio_orig"."
				 ,sexo = "."'$sexo'"."
				 ,profesion = "."$profe"."
				 ,estado_civil = "."'$estadoc'"."
				 ,domicilio = "."'$domicilio'"."
				 ,barrio_ciudad = "."'$barrioc'"."
				 ,telefono = "."'$telefono'"."
				 ,celular = "."'$celular'"."
				 ,padre_cedul = "."'$padrec'"."
				 ,padre_nombre = "."'$padren'"."
				 ,padre_apelli = "."'$padrea'"."
				 ,madre_cedul = "."'$madrec'"."
				 ,madre_nombre = "."'$madren'"."
				 ,madre_apelli = "."'$madrea'"."
				 ,conyu_cedul = "."'$conyuc'"."
				 ,conyu_nombre = "."'$conyun'"."
				 ,conyu_apelli = "."'$conyua'"."
				 ,orig_datos = "."'$orig'"."
				 ,docu_origen = "."'$docu_orig'"."
				 ,fechagra = "."'$hoy'"."
				 ,usuario = "."'$usua'"." 
				 ,depend_carga = "."'$depend'"."
				 
				  where nrodoc = '$nrodoc'";
				}
	 
				 $res = $mdb2->exec($sql);
                    if (PEAR::isError($res)) {
                       die($res->getMessage());
				    }
			if (!empty($nomimagen)){
			   
			
					 // ************************ Cargo Foto **************************************************************
			 $sql="insert into imagenes.foto (cedula,ruta,origen_datos,tipo_ima,subtipo_ima,observa,usugra,fechagra,depend_carga) values ('$nrodoc','$foto','certi_extra',1,9,'','$usua','$hoy','$depend')";
				
				 $sperr = $mdb2->exec($sql);
                 if (PEAR::isError($sperr)) {
                     //die($sperr->getMessage());
					print 'Error: '.$sql;
					exit(); 
                 }
				   unlink($ruta_fot);
			 	 if (copy($_FILES['files']['tmp_name'],$destino)){
                    $status = "Archivo subido";
				    print $status;
			     }else{
                    $status = "Error al subir el archivo";
                    print $status;
			     }	
					
			}
					 ?>
                     <script language="javascript">
    					 document.location.href="personas50.php";
					</script>		   
				   <?  
		          $mdb2->disconnect(); 
				} echo $msg;?>
					</font></span></td>
                <td width="297">&nbsp;</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td colspan="4"></td>
              </tr>
              <tr bgcolor="#FFFFFF">
              <td width="125" height="26"><span class="style2">Nro.C.I.:</span></td>
              <td width="296" align="left"><span class="style17">
                <?=$row['nrodoc'] ?>
              </span> </td>
              <td width="160" colspan="2" rowspan="11" align="left"> 
              <input type="file" id="files" name="files" title="Cambiar Imagen" />
              <br />
              <img borde=1 src="<?php print $ruta_fot;?>" width="150" name="image" id="image">
              <output id="list"></output>
         
              <script>
                 function archivo(evt) {
                    var files = evt.target.files; // FileList object
              
                    // Obtenemos la imagen del campo "file".
                    for (var i = 0, f; f = files[i]; i++) {
                      //Solo admitimos imágenes.
                      if (!f.type.match('image.*')) {
                         continue;
                      }
             
                      var reader = new FileReader();
             
                      reader.onload = (function(theFile) {
                         return function(e) {
                          // Insertamos la imagen
			  			 document.getElementById('image').src =''; 
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
            	</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Tipo C.I.:</span></td>
                <td align="left"><span class="style17">
                  <select name="tipodoc" id="tipodoc" <?=$deshabilita?>> 
                    <option value="<?=$tdoc?>" selected>
                      <?=$tdoc1?>
                      </option>
                    <? if ($tdoc!="CIP"){ ?>
                    <option value="CIP">CI.Provis.</option>
                    <? }?>
                    <? if ($tdoc!="PAS"){ ?>
                     <option value="PAS">Pasaporte</option>
                     <? }?>
                     <? if ($tdoc!="DNI"){ ?>
                     <option value="DNI">DNI</option>
                     <? }?>
                     <? if ($tdoc!="CEX"){ ?>
                     <option value="CEX">Cédula Extranj.</option>
                     <? }?>
                     <? if ($tdoc!="CAT"){ ?>
                     <option value="CAT">Carnet Adm.Tempo.</option>
                     <? }?> 
                     <? if ($tdoc!="CAP"){ ?>
                     <option value="CAP">Carnet Adm.Perma.</option>
                     <? }?>   
                      <? if ($tdoc!="CER"){ ?>
                     <option value="CER">Certificado</option>
                     <? }?>                 
                    </select>
                  &nbsp;&nbsp;&nbsp;
                  <input name="docu_orig" type="text" id="docu_orig" size="20" maxlength="190" value="<?=$row['docu_origen'] ?>"<?=$deshabilita?>>
                </span></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Nombre:</span></td>
                <td align="left"><input name="nombre" type="text" id="nombre" value="<?=$row['nombre'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Apellido:</span></td>
                <td align="left"><input name="apellido" type="text" id="apellido" value="<?=$row['apellido'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Fecha Nacimiento: </span></td>
                <td align="left"><span class="style17">
                  <input name="fechanac" type="text" id="fechanac" size="10" onBlur="valFecha(this)" maxlength="190" value="<?=$row['fechanac'] ?>"<?=$deshabilita?>>
&nbsp;&nbsp;<b>AAAA/MM/DD</b></span></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Lug.Nacimiento:</span></td>
                <td align="left"><input name="lugnac" type="text" id="lugnac" value="<?=$row['lugnac'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Nacionalidad:</span></td>
                <td align="left"><span class="style17">
                  <select name="nacio" id="nacio" <?=$deshabilita?>>
                    <option value="<?=$mnacio['idnacio']?>" selected="selected">
                      <?=$mnacio['descrip']?>
                      </option>
                    <?
				  $i=0;
				  while ($mnacio = $rnac ->fetchRow(MDB2_FETCHMODE_ASSOC)){
				      $ncla[$i]=$mnacio['idnacio'];
					  $ndescri[$i]=$mnacio['descrip']; ?>
                    <option value="<?=$ncla[$i] ?>">
                      <?=$ndescri[$i] ?>
                      </option>
                    <?
				  }     
				  ?>
                    </select>
                </span></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Nacio. Origen: </span></td>
                <td align="left"><span class="style17">
                  <select name="nacio2" id="nacio2" <?=$deshabilita?> >
                    <option value="<?=$nacioc?>" selected >
                      <?=$naciod?>
                      </option>
                    <?
				  $a=0;
			      while ($mnacio2 = $rnac2 ->fetchRow(MDB2_FETCHMODE_ASSOC)){
				      $ncla2[$a]=$mnacio2['idnacio'];
					  $ndescri2[$a]=$mnacio2['descrip']; ?>
                    <option value="<?=$ncla2[$a] ?>">
                      <?=$ndescri2[$a] ?>
                      </option>
                    <?
				  }     
				  ?>
                    </select>
                </span></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Sexo:</span></td>
				
				     <td align="left"><span class="style17">
			         <input name="sexo" type="radio" value="M" accesskey="M" <? print $csex ?><?=$deshabilita?>>
			         Masc.&nbsp;
				      <label>
                     <input name="sexo" type="radio" value="F" accesskey="F" <? print $csex1 ?><?=$deshabilita?>>
                     &nbsp;Fem. </label>
                      <label></label>
                </span>		          </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Profesión:</span></td>
                <td align="left"><span class="style17">
                  <label>
                  <select name="profe" id="profe" <?=$deshabilita?>>
                    <option value="<?=$profec?>" selected>
                      <?=$profed?>
                      </option>
                    <?
				  $e=0;
			      while ($mprofe = $rpro->fetchRow(MDB2_FETCHMODE_ASSOC)){
				      $rcpro[$e]=$mprofe['idprofesiones'];
					  $rdescpro[$e]=$mprofe['descripcion']; ?>
                    <option value="<?=$rcpro[$e] ?>">
                      <?=$rdescpro[$e] ?>
                      </option>
                    <?
				  }     
				  ?>
                  </select>
                  </label>
                </span></td>
                </tr>
              <tr bgcolor="#FFFFFF">
                <td height="26"><span class="style2">Estado Civil: </span></td>
                <td align="left"><span class="style17">
                  <select name="estadoc" id="estadoc" <?=$deshabilita?>>
                    <option value="<?=$tes?>" selected="selected">
                      <?=$tes1?>
                      </option>
                    <? if ($tes!="SO"){ ?>
                    <option value="SO">Soltero</option>
                    <? }?>
                    <? if ($tes!="CA"){ ?>
                    <option value="CA">Casado</option>
                    <? }?>
                    <? if ($tes!="SE"){ ?>
                    <option value="SE">Separado</option>
                    <? }?>
                    <? if ($tes!="DI"){ ?>
                    <option value="DI">Divorciado</option>
                    <? }?>
                    <? if ($tes!="VI"){ ?>
                    <option value="VI">Viudo</option>
                    <? }?>
                    <? if ($tes!="ME"){ ?>
                    <option value="ME">Menor</option>
                    <? }?>
                    </select>
                </span></td>
                </tr>
              <tr bgcolor="#FFFFFF">
              <td height="26"><span class="style2">Domicilio:</span></td>
              <td align="left"><input name="domicilio" type="text" id="domicilio" value="<?=$row['domicilio'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              <td><span class="style2">C.I. Madre:</span></td>
              <td><input name="madrec" type="text" id="madrec" value="<?=$row['madre_cedul'] ?>" size="15" maxlength="190"<?=$deshabilita?>></td>
              </tr>
              <tr bgcolor="#FFFFFF">
              <td height="26"><span class="style2">Barrio - Ciudad:</span></td>
              <td align="left"><input name="barrioc2" type="text" id="barrioc2" value="<?=$row['barrio_ciudad'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              <td><span class="style2">Nombre Madre:</span></td>
              <td><input name="madren" type="text" id="madren" value="<?=$row['madre_nombre'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              </tr>
              <tr bgcolor="#FFFFFF">
              <td height="26"><span class="style2">Tel&eacute;fono:</span></td>
              <td align="left"><input name="telefono2" type="text" id="telefono2" value="<?=$row['telefono'] ?>" size="20" maxlength="190"<?=$deshabilita?>></td>
              <td><span class="style19">
                <label><strong>Apellido Madre:</strong></label>
              </span></td>
              <td><input name="madrea" type="text" id="madrea" value="<?=$row['madre_apelli'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              </tr>
			   <tr bgcolor="#FFFFFF">
              <td height="26"><span class="style2">C.I. Padre:</span></td>
              <td align="left"><input name="padrec" type="text" id="padrec" value="<?=$row['padre_cedul'] ?>" size="15" maxlength="190"<?=$deshabilita?>></td>
              <td><strong>C.I. Conyugue:</strong></td>
              <td><input name="conyuc" type="text" id="conyuc" value="<?=$row['conyu_cedul'] ?>" size="15" maxlength="190"<?=$deshabilita?>></td>
              </tr>
			   <tr bgcolor="#FFFFFF">
              <td height="26"><span class="style2">Nombre Padre:</span></td>
              <td align="left"><input name="padren" type="text" id="padren" value="<?=$row['padre_nombre'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              <td><strong>Nombre Conyugue:</strong></td>
              <td><input name="conyun" type="text" id="conyun" value="<?=$row['conyu_nombre'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              </tr>
			   <tr bgcolor="#FFFFFF">
              <td height="26"><span class="style2">Apellido Padre:</span></td>
              <td align="left"><input name="padrea" type="text" id="padrea" value="<?=$row['padre_apelli'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              <td><strong>Apellido Conyugue:</strong></td>
              <td><input name="conyua" type="text" id="conyua" value="<?=$row['conyu_apelli'] ?>" size="50" maxlength="190"<?=$deshabilita?>></td>
              </tr>
              <tr bgcolor="#CCCCCC">
                <td height="129" colspan="4"><p align="right">&nbsp;</p>
                    <? if ($accion == 'modi'){?>
					<table width="117" border="0" align="right">
                      <tr>
                        <td><div align="center"><a href="personas50.php" target="imenu"><img src="imagenes/AQUA ICONS SYSTEM ALERT STOP.png" alt="cancelar" width="50" height="50" border="0"></a></div></td>
                        <td><input type="image" value="submit" name="Boton1" src="imagenes/100.png" height="50" width="50" onClick="return preguntaConfirmar()">
                            <input type="hidden" value="modificar" id="id" name="acc">
							<input type="hidden" value="<?=$row['nrodoc']?>" id="nrodoc" name="nrodoc">
                            <input type="hidden" value="<?=$id_foton ?>" id="id_foton" name="id_foton">
                            <input type="hidden" value="<?=$ruta_fot ?>" id="ruta_fot" name="ruta_fot">
                            <input type="hidden" value="<?=$orig_datos?>" id="orig_datos" name="orig_datos"></td>
                      </tr>
                      <tr>
                        <td><div align="center" class="style11">Cancelar</div></td>
                        <td><div align="center" class="style11">Guardar</div></td>
                      </tr>
                    </table><? } ?>
					 <? if ($accion == 'del'){?>
					 <table width="160" border="0" align="right" cellpadding="0" cellspacing="0">
                     <tr>
                      
					   <td height="35"><div align="center">
<input type="image" value="submit" name="Boton12" src="imagenes/borrar.PNG" height="15" width="60" border="0" onClick="return preguntaEliminar()">
					   </div>
					   <input type="hidden" value="eliminar" id="acc" name="acc">
					   <input type="hidden" value="<?=$row['nrodoc']?>" id="codi" name="codi"> 
                        
                       <input type="hidden" value="<?=$orig_datos?>" id="orig_datos" name="orig_datos">	</td>
                       <td></td>
                       <td><a href="personas50.php" target="imenu"><img src="facefiles/closelabel.gif" border="0"></a></td>
                     </tr>
                     <tr>
				 <td width="64" height="15"><div align="center"><strong><a href="carga_perso.php">Eliminar</a></strong></div></td>
				 <td>				 </td>
					  <td width="43">&nbsp;</td>
                     </tr>
				<tr>				</tr>
					</table><? };?>
                  <p align="right"><? //echo $sql;?> </p></td>
              </tr>
            </table>
        </form></td>
      </tr>
    </table><?  ?></td>
  </tr>
</table>

</body>
</html>

				  
