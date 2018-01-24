<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    
class Pdfs extends CI_Controller {
        
private $html= "";      
        

    function __construct() { 

        parent::__construct();
        $this->load->model('Referenciales_model');
        $this->load->model("Informes_model");
    }
    
    public function index()
    {
        //$data['provincias'] llena el select con las provincias españolas
        $data['provincias'] = $this->Referenciales_model->Nacionalidades_();
        //cargamos la vista y pasamos el array $data['provincias'] para su uso
        $this->load->view('templates/pdf', $data);
    }

   public function test(){
           echo "display error ". ENVIRONMENT."  ".ini_get("display_errors");
   }


   public function set_ContenidoHtml(  $arg){
 $this->html=  $arg;
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
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WItdH, $header_title , $header_string, array(0, 64, 255), array(0, 64, 128));
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
        $pdf->SetFont('helvetica', '', 12, '', true);
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.

        $pdf->AddPage();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));


// Establecemos el contenido para imprimir
        $html= $this->html;
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopatding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode( $nombre_archivo_str.".pdf");
        $pdf->Output($nombre_archivo, 'I');
    }


 



    




    public function arqueo_usuario(){  
        // la cadena html encerrada entre comillas simples
        $regs= $this->Informes_model->arqueo_usuario_diario();
        $totales= $regs['totales'];
        $detalle= $regs['detalle']; 
        $vartest= "blabla"
        // Estilos
        $estilo_tab1= "border: 1px #00td solid; background: gray;";
        $estilo1= "font-size:11px;";
$html=' 
<table  style="$estilo_tab1">
<tr><th>N&deg;</th> <th>N&deg; comprobante</th> <th>N&deg; certificado</th> 
<th>Fecha certificado</th> <th>Estado cobro</th> <th>Monto</th> 
<th>Nombres</th>  </tr>';

$r=0;
foreach ($detalle as $det):
$html.='
<tr> <td>'.$r.'</td> <td> '.$det['nrobol'].'  </td>
<td>'.$det['serie'].$det['nrocerti'].'</td><td>' .$det['fecha_bol']. ' </td>
<td> '  .  $det['estado']  .' </td> <td>  '.  $det['costo']  .' </td>
<td> '. $det['nombape'] . ' </td> 
</tr>';
$r++; 
endforeach;

    $html.= '</table>

    <table style="$estilo_tab1">
    <tr><th colspan="3">Resumen Cobros</th> </tr> 
    <tr><th>Estado</th> <th>Cantidad</th> <th>Monto</th> </tr>';
    if( sizeof($totales) > 0) {
        $html.='<tr><td>Boletas cobradas</td>  <td>'.$totales['Cant bol'].'</td>  <td>'.$totales['Total'].'</td></tr> 
        <tr><td>Boletas exoneradas</td>  <td>'.$totales['Cant bol exo'].'</td>  <td>0</td></tr>
        <tr><td>Boletas anuladas</td>  <td>'.$totales['Cant bol anu'].'</td>  <td>0</td></tr>
        <tr><td>Totales: </td>  <td>'.$totales['Cant bol'].'</td> <td>'.$totales['Total'].'</td> </tr> 
        </table>';
}

    $html.='
    <table style="border: 1px #00td solid; background: gray;">
    <tr><th colspan="3">Resumen Certificados</th> </tr> 
    <tr><th>Estado</th> <th>Cantidad</th> </tr>

    <tr><td>Emitidos</td>  <td>'.$totales['Cant certi'].'</td>  </tr> 
    <tr><td>Anulados</td>  <td>'.$totales['Cant certi anu'].'</td>  </tr>
    <tr><td>Regularizados</td>  <td>'.$totales['Cant certi reg'].'</td>  </tr>

    </table>';

        $this->set_ContenidoHtml( $html ); 
        $this->generar();  
        }


}