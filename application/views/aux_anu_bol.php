<?php
session_start();
error_reporting(0);

if($_SESSION['autoricer']!=1){
	header("Location: logout.php");
	exit();
}
//---------------- Verifico si el usuario esta con permiso---------------------
 
$usua=$_SESSION['usr'];

 include("conesis.php");
 $ssql="select * from permisos where usuario='$usua' and sistema='Certificados' and opciones='Anular'";
   
   $tveri = $mdb2->query($ssql);
    if (PEAR::isError($tveri)) {
      die($tveri->getMessage());
   }  
   $rowcont=$tveri->numRows();
 
  if ($rowcont==0){
     $msg = "No tiene autorizacion.";
	  header("Location: mensajes1.php?m=$msg");
	 exit();
   }
  
  $mdb2->disconnect();

//--------------- Aca empieza la consulta ....

  include("cone.php");
 
     $sql = "select date(fechagra) as fechagra,tipo,count(tipo) as canti,observa from certificado.bloqueado_bolcerti group by date(fechagra),
tipo,observa order by date(fechagra)";
     $res = $mdb2->query($sql);
	
 
  $mdb2->disconnect();   

?>


<html><style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style2 {font-size: 30px}
.style3 {font-size: 14px}
.style4 {font-size: 13px; }
.style5 {font-size: 13px; font-weight: bold; }
.style6 {font-size: 12px; }
-->
</style>
<body>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<table width="936" height="285" border="1" align="center">
	  <tr>
	    <td height="74" colspan="2" align="center" bgcolor="#E8FFFF" class="style2">
		<img src="../sistemas/imagenes/usuario1.gif" width="59" height="60" border="0">BLOQUEAR CERTIFICADO o BOLETAS </td>
	 </tr>
	 <tr>
	 <td width="873" height="98" bgcolor="#F4F4F4">
	 
    		<table align="center" >
    			
    			
    	
	 
	 <td width="59" bgcolor="#CCCCCC"><div align="center"><a href="main.php" target="_top">Salir</a></div></td>
	 </tr>
	 <tr>
	 <td colspan="2">
	 
  			<table width="910" >
  				<tr>
  				  <th height="20" colspan="8" bgcolor="#E1FFFF">&nbsp;</th>
			  </tr>
  				<tr>
  				 
				  <th width="97" bgcolor="#EFEFEF"><div align="center" class="style3">Fecha anul.</div></th>
				  <th width="104" bgcolor="#EFEFEF"><div align="center" class="style3">Tipo</div></th>
				  <th width="76" bgcolor="#EFEFEF"><div align="center" class="style3">Cant.Bloq.</div></th>
				  <th width="568" bgcolor="#EFEFEF"><div align="left" class="style3">Observa.</div></th>
				
				  <th width="41"><a href="abmanulado.php">
			      <input name="" type="image" src="imagenes/db_add.png" width="30" height="30" title="Agragar Anulados"></a></th>
					
  				</tr>		
  			  <?php 
  			    if($res){
                  while($row = $res->fetchRow(MDB2_FETCHMODE_ASSOC)){ 
				    $id=$row['id'];
				    $tipo=$row['tipo'];
				    $canti=$row['canti'];
				    $observa=$row['observa'];
				    $fechagra=$row['fechagra'];
				 
       ?>	
    			<tr>
    				<td><a href="anu_bolcerti2.php?fecha=<?=$fechagra ?>&tipo=<?=$tipo ?>" target="_blank"><div align="left" class="style5"><?php echo $fechagra?></div></a></td>
				    <td><div align="left" class="style4"><?php echo $tipo?></div></td>
				    <td><div align="left" class="style6"><div align="left"><?php echo $canti?></div>
				    </div></td>
				    <td><div align="left" class="style6"><div align="left"><?php echo $observa?></div>
				    </div></td>
				   
				  <td>&nbsp;</td>			
    			</tr>
    			<?php 
                  }                      
  			    } //si hay resultado               
              ?>	
              
                <tr>
                  <td colspan="8">&nbsp;</td>
                </tr>
              <tr>
               		
		  </table>
	  		</td>
	  </tr>
</table>
</body>
</html>	