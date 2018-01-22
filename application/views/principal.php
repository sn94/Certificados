<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php   $BaseUrl= base_url();                      ?>
<html  lang="es">
	<head>
		<title>M&Oacute;DULO DE CERTIFICADOS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
-->

<!-- Bootstrap 4 -->
<link rel="stylesheet" href="assets/css/bootstrap.css"/>
<!-- BS MAP -->
<link rel="stylesheet" href="assets/css/bootstrap.css.map"/>
<!-- JQuery UI -->
<link rel="stylesheet"  href="assets/css/jquery-ui.css" />  
 <!-- Tema de jquery ui -->
<link rel="stylesheet"href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/pepper-grinder/jquery-ui.css"/>
 
 

		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="<?= $BaseUrl?>assets/css/main.css?v=4" />
        <link rel="stylesheet" href="<?= $BaseUrl?>assets/css/menu_dropdown.css?v=2"/>
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
    
    <style type="text/css">
    html {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*, *:before, *:after {
  -webkit-box-sizing: inherit;
  -moz-box-sizing: inherit;
  box-sizing: inherit;
  }
  
  
  body{ background-color:  #111518; }
  
 	#header{ background-color: #162023;	}
 	#footer{ background-color: #111518;}
    ul.content-dropdown{ display:none;}
    
    #main > section.one {
	background-color: #81918E;
	background-image: url("images/depart_info.jpg");
			}
            
   h2.alt{ 
   color: white;
    text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
   }
    
    
 .resultados{ padding: 0% 5% 0% 5%; background-color: #212825; }
 
 
 
 /** PADDING DE FORM **/
 .formulario{ 
 color: black; font-weight: bolder; background-color: white;padding: 5px; }
 /** TITULO DE FORM **/ 
  
 .formulario h2{  
 background-color: #4D4C4D;color: white; text-shadow: 2px 2px 7px gray; text-align: center;
 }
 
 .formulario .tabla{ background-color:  #ffffcc; }
 .formulario span, .formulario label{ font-size: 16px;  color: rgb(40,40,40); }
  .formulario label{ font-weight: bolder; font-size: 16px;}
 .formulario .thr{
 background-color: rgba(0,255,0, 0.3);
  border-top: rgba(55,55,55, 0.3) solid 1px;
  padding: 0;
  }
 
 .formulario .th{
 border-left: rgba(33,33,33, 0.3) solid 1px; 
 border-right: rgba(33,33,33, 0.3) solid 1px;
 margin:0; padding:0;
     }



    
.formulario div.thr div.row:nth-child(1){ background-color: green;}
 .formulario span.titulo{ font-weight: bolder;}
 /** COLOR DE FUENTE  **/
 .formulario input[type=text], .formulario label, .formulario select{
    color: black;  font-size: 14px;  }
  
  
  
  /***ACCORDION  **/
 /*Cambiar las propiedades del contenido: background, font-size, font-family ...*/
.ui-accordion .ui-accordion-content
{
background: whitesmoke;
color: black;
font-size: 14px;
}

/*Cambiar las propiedades de la cabecera: background, font-size, font-family ...*/
.ui-accordion .ui-accordion-header
{
background: #777777;
color: #FFFFFF;
font-size: 12px; padding-left: 10px;
}

/*Cambiar las propiedades de la tecla activa de la cabecera: background, font-size, font-family ...*/
.ui-accordion .ui-accordion-header-active
{
background: #dddddd; color: black;
}

/*Cambiar las propiedades de la cabecera al pasar el mouse sobre: background, font-size, font-family ...*/
.ui-accordion .ui-accordion-header:hover
{
background: orange;
font-style: italic;
}

 
  





@media screen  and (max-width: 768px){
.resultados{ padding: 0% 1% 0% 1%; }
}
 
 
@media only screen and (max-width: 800px) {
    
    /* Force table to not be like tables anymore */
	#no-more-tables table, 
	#no-more-tables thead, 
	#no-more-tables tbody, 
	#no-more-tables th, 
	#no-more-tables td, 
	#no-more-tables tr { 
		display: block; 
	}
 
	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
 
	#no-more-tables tr { border: 1px solid #ccc; }
 
	#no-more-tables td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
		white-space: normal;
		text-align:left;
	}
 
	#no-more-tables td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
	}
 
	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
}
 
    </style>
	<body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><a href="<?=base_url()?>"><img src="<?= $BaseUrl?>/images/logo.png" alt=""  /></a></span>
							<h1 id="title">Certificados</h1>
							<p><?= $this->nativesession->get('usr');?></p>
						</div>

				<?php include('application/views/enlaces_menu.php'); ?>
				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		 <!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
                            <h2 class="alt" >Bienvenido!</h2>
							<h2 class="alt">Este sitio web es un m&oacute;dulo del Sistema de procesamientos y gestiones</h2>
                            <h2 class="alt">Aqu&iacute; podr&aacute; efectuar los procesamientos pertinentes para certificados de antecedentes para extranjeros<br />
							 </h2>
							 <a
							 class="btn btn-primary"
							 href="<?=base_url()?>index.php/Pdfs/index">nacionalidades</a>
							 
							</header>

							<footer>
								<a href="#portfolio" class="btn btn-primary">Volver al Sistema de procesamientos</a>
							</footer>

						</div>
					</section>


			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
<ul class="copyright">
			 <li>&copy; Departamento de inform&aacute;tica. </li>
 </ul>

			</div>

		<!-- Scripts -->
        
  
<!-- JQuery -->
<script type="text/javascript" src="<?=$BaseUrl?>assets/js/jquery-3.2.1.min.js"></script>
<!--  slim tether -->
 <script type="text/javascript" src="<?= $BaseUrl?>assets/js/tether.min.js"></script>
<!-- Bootstrap  4  -->
 <script type="text/javascript" src="<?= $BaseUrl?>assets/js/bootstrap.js"></script>
<!-- JQuery UI  --> 
<script type="text/javascript" src="<?= $BaseUrl?>assets/js/jqueryui/jquery.js"></script>
<script type="text/javascript" src="<?= $BaseUrl?>assets/js/jqueryui/jquery-ui.js"></script>

 
   
<!-- <script src="assets/js/jquery.min.js"></script> -->
<script src="<?= $BaseUrl?>assets/js/jquery.scrolly.min.js"></script>
<script src="<?= $BaseUrl?>assets/js/jquery.scrollzer.min.js"></script>
<script src="<?= $BaseUrl?>assets/js/skel.min.js"></script>
<script src="<?= $BaseUrl?>assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="<?= $BaseUrl?>assets/js/main.js"></script>
<script src="<?= $BaseUrl?>assets/js/menu_dropdown.js?v=3"></script>

<script type="text/javascript">
  
  $(function(){/** ** ** ** **/
  

 /***Configuracion de enlaces **/ 
  $("ul#grupo-enlaces a").css("width","100%");
    
  $("ul#grupo-enlaces a[enlace]").click(function( evento ){
 if( ! $("div#main").hasClass("resultados"))
   $("div#main").addClass("resultados");
   
  var enlace= $(this);
 var url_enlace=  $(this).attr("enlace"); 

  
  $("div#main").load(url_enlace);
 
});
  /*********************************/
  
 
 

    
    
  });/** ** ** ***/
    
 
            </script>

	</body>
</html>