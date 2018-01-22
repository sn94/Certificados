<?php
 ini_set('display_errors', '1');

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    
class GeneradorPdf extends CI_Controller {
        

private $contenido_HTML="";


    function __construct(){
        parent::__construct();
        //$this->load->model("PDF");
    
    }


    
    public function generar() {
        $header_string="xxxxxxx";
        $header_title="CERTIFICADOS-INFORMES"; 
        $nombre_archivo_str="informe";

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
       
           
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Tcpdf library');
        $pdf->SetTitle('Informes (Certificados)');
        $pdf->SetSubject('Informe pdf');
        $pdf->SetKeywords('informe, PDF, certificados');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $header_title , $header_string, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

        //color del texto 
        $pdf->SetTextColor(0, 0, 0); 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
         $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
         $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
         $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
         $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('freemono', '', 14, '', true);
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));


// Establecemos el contenido para imprimir
        $html= $this->contenido_HTML;
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode( $nombre_archivo_str.".pdf");
        $pdf->Output($nombre_archivo, 'I');
    }



public function set_ContenidoHtml( $arg ){
$this->contenido_HTML= $arg;
}





    public function arqueo_usuario(){
    $arg=" hello world";
    print "Aadds";
    //$this->set_ContenidoHtml( $arg );
    //$this->generar();

    }







}