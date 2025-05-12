<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/categorias.controlador.php";
require_once "../../../modelos/categorias.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../fpdf/fpdf.php";

class reporteProductoPorCategoria
{


    public $idCategoria;
    public $idUsuario;

    public function generarPdfProductoPorCategoria()
    {
         // Establecer la zona horaria de Bolivia
         date_default_timezone_set('America/La_Paz');
        $idCategoria = $this->idCategoria;
        $idUsuario = $this->idUsuario;

        $respuestaProductos = ControladorProductos::ctrMostrarProductosSegunCategoria($idCategoria);

        $itemUsuario = "id";

        $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $idUsuario);

        //TRAEMOS LA INFORMACIÓN DEL VENDEDOR

        $itemCategoria = "id";
        // $valorVendedor = $respuestaVentas["id_proveedor"];

        if ($idCategoria != 0) {
            $respuestaCategoria = ControladorCategorias::ctrMostrarCategorias($itemCategoria, $idCategoria);
        } else {
            $respuestaCategoria["categoria"] = "Todos";
        }

   
            $DateAndTime = date('d-m-Y h:i:s a', time());

            $pdf = new FPDF('P','mm','letter');
            $pdf->AddPage();
            $pdf->SetMargins(12,12,12);
            $pdf->SetTitle("PRODUCTO SEGUN CATEGORIA");
            $pdf->SetFont('Arial','B',15);
            /* $pdf->image('images/',185,10,18,16,'jpg'); */


            $pdf->Cell(195,5,utf8_decode("REPORT DE CATEGORIA"),0,1,'C');


            $pdf->Ln(5);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,5,utf8_decode('Usuario/a:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(50,5,utf8_decode($respuestaUsuario["nombre"]),0,1,'L');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,5,utf8_decode('Categoria:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(50,5,$respuestaCategoria["categoria"],0,1,'L');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,5,utf8_decode('Fecha y hora:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(50,5,$DateAndTime,0,1,'L');
            $pdf->Ln(5);

            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(12,5,utf8_decode('Nº'),1,0,'L');
            $pdf->Cell(28,5,utf8_decode('codigo'),1,0,'L');
            $pdf->Cell(72,5,utf8_decode('nombre'),1,0,'L');
     
            $pdf->Cell(26,5,utf8_decode('Precio venta'),1,0,'L');
            $pdf->Cell(30,5,utf8_decode('Precio compra'),1,0,'L');
            $pdf->Cell(24,5,utf8_decode('stock'),1,1,'L');
            $pdf->SetFont('Arial','',11);

  



            $contador = 1;
            $sum=0;
            $cortar = 47;
            $pdf->SetAutoPageBreak(false);
            foreach ($respuestaProductos as $producto) {
                $pdf->Cell(12,5,$contador,1,0,'L');
                $pdf->Cell(28,5,$producto['codigo'],1,0,'L');
                $pdf->Cell(72,5,utf8_decode($producto['descripcion']),1,0,'L');
                $pdf->Cell(26,5,$producto['precio_venta'],1,0,'L');
                $pdf->Cell(30,5,$producto['precio_compra'],1,0,'L');
                $pdf->Cell(24,5,$producto['stock'],1,1,'L');
                $contador++;

                if ($contador==$cortar) {
                    $pdf->AddPage();
                    $cortar= $cortar+50;
                }
            }
            $pdf->Ln();
         
        // Salida del archivo PDF
        $pdf->Output('factura.pdf', 'I');
    }
}

$factura = new reporteProductoPorCategoria();
$factura->idCategoria = $_GET["idCategoria"];
$factura->idUsuario = $_GET["idUsuario"];
$factura->generarPdfProductoPorCategoria();
