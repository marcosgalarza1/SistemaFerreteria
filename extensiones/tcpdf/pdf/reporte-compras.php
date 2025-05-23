<?php

require_once "../../../controladores/compras.controlador.php";
require_once "../../../modelos/compras.modelo.php";


require_once "../../../controladores/proveedor.controlador.php";
require_once "../../../modelos/proveedor.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class reporteCompra
{


    public $fechaInicio;
    public $fechaFin;
    public $idProveedor;
    public $idUsuario;

    public function generarPdfCompras()
    {
        // Establecer la zona horaria de Bolivia
        date_default_timezone_set('America/La_Paz');
        $fechaInicio = $this->fechaInicio;
        $fechaFin = $this->fechaFin;
        $idProveedor = $this->idProveedor;
        $idUsuario = $this->idUsuario;

        $respuestaCompra = ControladorCompras::ctrRangoFechasComprasPdf($fechaInicio, $fechaFin, $idProveedor);

        $itemUsuario = "id";

        $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $idUsuario);

        //TRAEMOS LA INFORMACIÓN DEL VENDEDOR

        $itemVendedor = "id";
        // $valorVendedor = $respuestaCompra["id_proveedor"];

        if ($idProveedor != 0) {
            $respuestaProveedor = ControladorProveedors::ctrMostrarProveedors($itemVendedor, $idProveedor);
        } else {
            $respuestaProveedor["nombre"] = "Todos";
        }

        //REQUERIMOS LA CLASE TCPDF

        require_once('tcpdf_include.php');

        // Configuración del PDF para UTF-8
        $pdf = new TCPDF('P', 'mm', 'LETTER', true, 'UTF-8', false);


        // Desactivar encabezado y pie de página
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Ajustar márgenes a cero
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle('Compra de productos');
        $pdf->AddPage();

        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(0, 5, 'Compra de productos', 0, 1, 'C');
/*         $pdf->Image('images/', 185, 10, 18, 16, 'jpg', '', 'T', false, 300, '', false, false, 0, false, false, false);
 */
        $pdf->Ln(10); // Espacio después de la imagen

        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(23, 5, 'Cajero/a: ', 0, 0, 'L');
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(50, 5, $respuestaUsuario["nombre"], 0, 1, 'L');

        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(23, 5, 'Proveedor: ', 0, 0, 'L');
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(50, 5, $respuestaProveedor["nombre"], 0, 1, 'L');

        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(23, 5, 'Periodo: ', 0, 0, 'L');
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(100, 5, date("d-m-Y ", strtotime($fechaInicio)) . " al " . date("d-m-Y", strtotime($fechaFin)), 0, 1, 'L');

        $DateAndTime = date('d-m-Y h:i:s a', time());
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(23, 5, utf8_decode('Fecha y hora:'), 0, 0, 'L');
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(50, 5, $DateAndTime, 0, 1, 'L');

        $pdf->Ln(5);
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->SetFillColor(0, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 5, 'Detalle de productos', 1, 1, 'C', 1);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(14, 5, 'No', 1, 0, 'L');
        $pdf->Cell(22, 5, 'Codigo', 1, 0, 'L');
        $pdf->Cell(30, 5, 'Fecha', 1, 0, 'L');
        $pdf->Cell(50, 5, 'Usuario', 1, 0, 'L');
        $pdf->Cell(50, 5, 'Proveedor', 1, 0, 'L');
        $pdf->Cell(30, 5, 'Monto', 1, 1, 'L');
        $pdf->SetFont('helvetica', '', 8);

        //Imprimir los detalles de los productos
        $contador = 1;
        $sumTotal = 0;
        foreach ($respuestaCompra as $item) {
            $total =  $item["total"];
            $pdf->Cell(14, 5,  $contador, 1, 0, 'L');
            $pdf->Cell(22, 5, $item["codigo"], 1, 0, 'L');
            $pdf->Cell(30, 5, $item["fecha_alta"], 1, 0, 'L');
            $pdf->Cell(50, 5, $item["usuario"], 1, 0, 'L');
            $pdf->Cell(50, 5, $item["proveedor"], 1, 0, 'L');
            $pdf->Cell(30, 5, $total, 1, 1, 'R');
            $contador++;
            $sumTotal += $total;
        }

        // Total de la compra
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(166, 5, 'Total ', 0, 0, 'R');
        $pdf->Cell(30, 5, number_format($sumTotal, 2, '.', ',') . ' Bs.', 1, 1, 'R');


        // Nro de compras
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(30, 5, 'Número de compras:  ' . $contador - 1, 0, 0, 'L');

        // Salida del archivo PDF
        $pdf->Output('factura.pdf', 'I');
    }
}

$factura = new reporteCompra();
$factura->fechaInicio = $_GET["fechaInicio"];
$factura->fechaFin = $_GET["fechaFin"];
$factura->idProveedor = $_GET["idProveedor"];
$factura->idUsuario = $_GET["idUsuario"];
$factura->generarPdfCompras();
