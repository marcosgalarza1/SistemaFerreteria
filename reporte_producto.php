<?php
require "fpdf/conexion.php";
require "fpdf/fpdf.php";

class PDF extends FPDF
{
    // Encabezado de página
    function Header()
    {
        // Añadir imagen en la esquina superior izquierda
        /* $this->Image('vistas/img/', 10, 4, 30); */
        // Añadir imagen en la esquina superior derecha (opcional)
        /* $this->Image('vistas/img/', 170, 8, 30); */ // Ajusta la posición si es necesario
        // Título
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'FERREETERIA FERROJMAXS', 0, 1, 'C');
        $this->Cell(0, 8, utf8_decode('URB ESPAÑA'), 0, 1, 'C');


        
       

        $this->Ln(7); // Mayor separación después del título

        // Título del reporte
        $this->SetFont("Arial", "B", 12);
        $this->Cell(0, 0, "REPORTE LISTA DE PRODUCTOS", 0, 1, "C");
        $this->Ln(5); // Espacio entre el título y la tabla
    }

    // Encabezado de la tabla
    function TablaHeader()
    {
        $this->SetFont("Arial", "", 9);
        $this->SetFillColor(200, 200, 200); // Color de fondo de las cabeceras

        // Ajustar el ancho total de la tabla
        $tablaAncho = 180; // Ancho total de la tabla en mm
        $anchoColumna = array(20, 70, 15, 25, 20, 35); // Ajusta el ancho de cada columna

        // Calcular la posición inicial para centrar la tabla
        $posX = (210 - $tablaAncho) / 2; // 210 mm es el ancho de A4
        $this->SetX($posX);

        // Imprimir cabeceras de la tabla
        $this->Cell($anchoColumna[0], 10, "CODIGO", 1, 0, "C", true);
        $this->Cell($anchoColumna[1], 10, "DESCRIPCION", 1, 0, "C", true);
        $this->Cell($anchoColumna[2], 10, "STOCK", 1, 0, "C", true);
        $this->Cell($anchoColumna[3], 10, "PRECIO", 1, 0, "C", true);
        $this->Cell($anchoColumna[4], 10, "VENTAS", 1, 0, "C", true);
        $this->Cell($anchoColumna[5], 10, "FECHA", 1, 1, "C", true);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15); // Posición a 1.5 cm del final
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        date_default_timezone_set('America/La_Paz');
        $this->Cell(0, 10, 'Fecha: ' . date('d-m-Y'), 0, 0, 'R');
    }
}

// Crear una instancia de FPDF y agregar una página
$pdf = new PDF("P", "mm", "A4");
$pdf->AliasNbPages();
$pdf->AddPage();

// Imprimir el encabezado de la tabla
$pdf->TablaHeader();

// Establecer la fuente para los datos
$pdf->SetFont("Arial", "", 9);

// Ajustar el ancho total de la tabla y las columnas
$tablaAncho = 180; // Ancho total de la tabla en mm
$anchoColumna = array(20, 70, 15, 25, 20, 35); // Ancho de cada columna

// Ejecutar la consulta y agregar los datos al PDF
$sql = "SELECT id, codigo, descripcion, imagen, stock, precio_venta, ventas, fecha FROM productos";
if ($resultado = $mysqli->query($sql)) {
    while ($fila = $resultado->fetch_assoc()) {
        // Verificar si el espacio en la página es suficiente para la fila
        if ($pdf->GetY() + 10 > 270) { // Verifica si la posición Y está cerca del final de la página
            $pdf->AddPage(); // Añade una nueva página
            $pdf->TablaHeader(); // Imprime el encabezado de la tabla en la nueva página
        }

        $pdf->SetX((210 - $tablaAncho) / 2); // Asegurarse de estar en la posición correcta

        // Imprimir datos de la fila
        $pdf->Cell($anchoColumna[0], 10, $fila['codigo'], 1, 0, "C");
        $pdf->Cell($anchoColumna[1], 10, strtoupper($fila['descripcion']), 1, 0, "L");
        $pdf->Cell($anchoColumna[2], 10, $fila['stock'], 1, 0, "C");
        $pdf->Cell($anchoColumna[3], 10, number_format($fila['precio_venta'], 2), 1, 0, "R");
        $pdf->Cell($anchoColumna[4], 10, $fila['ventas'], 1, 0, "C");
        $pdf->Cell($anchoColumna[5], 10, $fila['fecha'], 1, 1, "C");
    }
    $resultado->free();
} else {
    $pdf->Cell(0, 10, "Error en la consulta: " . $mysqli->error, 0, 1, "C");
}

// Cerrar y generar el PDF
$pdf->Output();
?>
