
<?php


require_once "../../../controladores/compras.controlador.php";
require_once "../../../modelos/compras.modelo.php";

require_once "../../../controladores/reportes.controlador.php";
require_once "../../../modelos/reportes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";
require_once "../../../fpdf/fpdf.php";


class PdfGanancias
{

    public $idUsuario;
    public $month = null;
    public $year = null;

    public function generarpdfganancia()
    {
        // Establecer la zona horaria de Bolivia
        date_default_timezone_set('America/La_Paz');

        $nombreTienda = "Ferreteria FerroExpress"; //$this->configuracion->select('valor')->where('nombre','tienda_nombre')->get()->getRow()->valor;
        $direccionTienda = "Urb. España"; // $this->configuracion->select('valor')->where('nombre','tienda_direccion')->get()->getRow()->valor;

        $DateAndTime = date('d-m-Y h:i:s a', time());
        // $db     =\Config\Database::connect();
        switch ($this->month) {
            case 1:
                $mes = "Enero";
                break;
            case 2:
                $mes = "Febrero";
                break;
            case 3:
                $mes = "Marzo";
                break;
            case 4:
                $mes = "Abril";
                break;
            case 5:
                $mes = "Mayo";
                break;
            case 6:
                $mes = "Junio";
                break;
            case 7:
                $mes = "Julio";
                break;
            case 8:
                $mes = "Agosto";
                break;
            case 9:
                $mes = "Septiembre";
                break;
            case 10:
                $mes = "Octubre";
                break;
            case 11:
                $mes = "Noviembre";
                break;
            case 12:
                $mes = "Diciembre";
                break;
        }
        //REQUERIMOS LA CLASE TCPDF


        $pdf = new FPDF('P', 'mm', 'letter');

        $pdf->AddPage();
        $pdf->SetMargins(12, 12, 12);
        $pdf->SetTitle("Reporte de Rango Fechas");
        $pdf->SetFont('Arial', 'B', 15);
        // $pdf->image('/images/logo-negro-bloque.jpg',185,10,18,16,'PNG');

        $pdf->Cell(195, 5, utf8_decode("REPORTE GANACIA"), 0, 1, 'C');
        $pdf->Cell(195, 5, utf8_decode("POR  MES"), 0, 1, 'C');

/*         $pdf->Image('images/', 185, 10, 18, 16, 'jpg', '', 'T', false, 300, '', false, false, 0, false, false, false);
 */        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 5, utf8_decode('Ferreteria:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 5, utf8_decode($nombreTienda), 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 5, utf8_decode('Dirección:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 5, $direccionTienda, 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 5, utf8_decode('Periodo:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 5, $mes . ' de ' . $this->year, 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 5, utf8_decode('Fecha y hora:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 5, $DateAndTime, 0, 1, 'L');
        $pdf->Ln(5);

        $pdf->SetFont('Arial', 'B', 11);

        $pdf->Cell(12, 5, utf8_decode('Nº'), 1, 0, 'L');
        $pdf->Cell(26, 5, utf8_decode('Folio'), 1, 0, 'L');
        $pdf->Cell(26, 5, utf8_decode('fecha'), 1, 0, 'L');
        $pdf->Cell(30, 5, utf8_decode('vendedor'), 1, 0, 'L');
        $pdf->Cell(50, 5, utf8_decode('cliente'), 1, 0, 'L');
        $pdf->Cell(24, 5, utf8_decode('Monto'), 1, 0, 'L');
        $pdf->Cell(24, 5, utf8_decode('Ganancia'), 1, 1, 'L');
        $pdf->SetFont('Arial', '', 11);

        $ganancias = ModeloReportes::mdlObtenerGanancias($this->month, $this->year);

        $contador = 1;
        $sum = 0;
        $sum_ganancias = 0;
        $cortar = 47;
        $pdf->SetAutoPageBreak(false);
        foreach ($ganancias as $ganancia) {
            $pdf->Cell(12, 5, $contador, 1, 0, 'L');
            $pdf->Cell(26, 5, $ganancia['codigo'], 1, 0, 'L');
            $pdf->Cell(26, 5, utf8_decode($ganancia['fecha']), 1, 0, 'L');
            $pdf->Cell(30, 5, utf8_decode($ganancia['vendedor']), 1, 0, 'L');
            $pdf->Cell(50, 5, utf8_decode($ganancia['cliente']), 1, 0, 'L');
            $pdf->Cell(24, 5, $ganancia['total'], 1, 0, 'L');
            $pdf->Cell(24, 5, $ganancia['ganancia'], 1, 1, 'R');
            $sum = $sum + $ganancia['total'];
            $sum_ganancias = $sum_ganancias + $ganancia['ganancia'];
            $contador++;

            if ($contador == $cortar) {
                $pdf->AddPage();
                $cortar = $cortar + 50;
            }
        }
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(168, 5, 'Total Ganancias', 0, 0, 'R');
        $pdf->Cell(24, 5, '' . number_format($sum_ganancias, 2, '.', ',') . ' Bs.', 1, 0, 'R');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(38, 5, utf8_decode('Número de ventas:'), 0, 0, 'L');
        $pdf->Cell(20, 5, $contador - 1, 0, 1, 'L');

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(38, 5, utf8_decode('Monto total de ventas:'), 0, 0, 'L');
        $pdf->Cell(20, 5, '' . number_format($sum, 2, '.', ',') . ' Bs.', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(38, 5, utf8_decode('Total Ganancia:'), 0, 0, 'L');
        $pdf->Cell(20, 5, '' . number_format($sum_ganancias, 2, '.', ',') . ' Bs.', 0, 1, 'L');

        $pdf->Output('gananciaspormes.pdf', 'I');
    }
}

$factura = new PdfGanancias();

$factura->month = $_GET["month"];
$factura->year = $_GET["year"];
$factura->idUsuario = $_GET["idUsuario"];

$factura->generarpdfganancia();

?>
