<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura
{

    public $codigo;

    public function traerImpresionFactura()
    {

        // TRAEMOS LA INFORMACIÓN DE LA VENTA
        $itemVenta = "codigo";
        $valorVenta = $this->codigo;

        $respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);
        $fecha = date('d/m/Y H:i:s', strtotime($respuestaVenta["fecha"])); // Formatear la fecha y hora
        $productos = ControladorVentas::ctrMostrarDetalleVentas($respuestaVenta['id']);

        $total = number_format($respuestaVenta["total"], 2);


        // TRAEMOS LA INFORMACIÓN DEL CLIENTE
        $itemCliente = "id";
        $valorCliente = $respuestaVenta["id_cliente"];
        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

        // TRAEMOS LA INFORMACIÓN DEL VENDEDOR
        $itemVendedor = "id";
        $valorVendedor = $respuestaVenta["id_vendedor"];
        $respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

        // REQUERIMOS LA CLASE TCPDF
        require_once('tcpdf_include.php');
        $pdf = new TCPDF('P', 'mm', array(80, 200), true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 10);

        // Información de la tienda
        $html = '
        <table style="border-bottom: 1px solid #000;">
            <tr>
                <td style="text-align:center; font-size: 13px;">
                <strong>Comprobante</strong><br>
                    <strong>de venta</strong><br>
                    <span style="font-size: 15px;">' . $valorVenta . '</span><br>
                    <span style="font-size: 10px;">Fecha: ' . $fecha . '</span>
                </td>
            </tr>
        </table>';

        $pdf->writeHTML($html, false, false, false, false, '');

        // Línea de separación
        $pdf->Ln(2);

        // Información del cliente 
        $html = '
        <table style="font-size: 11px;">
            <tr>
                <td>
                    <strong>Usuario/a:</strong> ' . $respuestaVendedor["nombre"] . '<br>
                    <strong>Cliente:</strong> ' . $respuestaCliente["nombre"] . '
                </td>
            </tr>
        </table>';

        $pdf->writeHTML($html, false, false, false, false, '');

        // Tabla de productos
        $html = '
        <table border="0" cellpadding="4" style="width:100%;">
            <tr style="background-color:#f2f2f2;">
                <th style="width:45%; text-align:left;">Concepto</th>
                <th style="width:20%; text-align:center;">Cant.</th>
                <th style="width:25%; text-align:right;">Precio</th>
                <th style="width:20%; text-align:right;">Total</th>
            </tr>';

        foreach ($productos as $item) {
            $valorUnitario = number_format($item["precio_venta"], 2);
            $precioTotal = number_format($item["subtotal"], 2);
            $html .= '
            <tr>
                <td>' . $item["producto"] . '</td>
                <td style="text-align:center;">' . $item["cantidad"] . '</td>
                <td style="text-align:right;">' . $valorUnitario . '</td>
                <td style="text-align:right;">' . $precioTotal . '</td>
            </tr>';
        }

        $html .= '</table>';
        $pdf->writeHTML($html, false, false, false, false, '');

        // Espacio
        $pdf->Ln(2);
        $pdf->writeHTML('<hr style="border:1px solid #000;">', false, false, false, false, '');

        // Total
        $html = '
        <table>
            <tr>
                <td style="text-align:right;">
                    <strong>Total: Bs ' . $total . '</strong>
                </td>
            </tr>
        </table>';
        $pdf->writeHTML($html, false, false, false, false, '');

        // SALIDA DEL ARCHIVO
        $pdf->Output('factura.pdf', 'I');
    }
}

$factura = new imprimirFactura();
$factura->codigo = $_GET["codigo"];
$factura->traerImpresionFactura();
