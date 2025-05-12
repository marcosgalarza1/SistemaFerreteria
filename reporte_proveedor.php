<?php
require "fpdf/conexion.php";
require "fpdf/fpdf.php";

class PDF extends FPDF
{
    // Encabezado de página
    function Header()
    {
        // Añadir imagen en la esquina superior izquierda
        /*  $this->Image('vistas/img/', 10, 4, 30); */

        // Añadir imagen en la esquina superior derecha (opcional)
        /* $this->Image('vistas/img/', 170, 8, 30); */ // Ajusta la posición si es necesario

        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'FERRETERIA FERROJMSXS', 0, 1, 'C');
       
        $this->Cell(0, 8, utf8_decode('URB ESPAÑA'), 0, 1, 'C');

        $this->Ln(7); // Mayor separación después del título

        // Título en cada página
        $this->SetFont("Arial", "B", 12);
        $this->Cell(0, 0, "REPORTE LISTA DE PROVEEDORES", 0, 1, "C");
        $this->Ln(5); // Espacio entre el título y la tabla
    }

    // Encabezado de la tabla
    function TablaHeader()
    {
        $this->SetFont("Arial", "", 10);
        $this->SetFillColor(200, 200, 200); // Color de fondo de las cabeceras

        // Ajustar el ancho total de la tabla (restar márgenes izquierdo y derecho)
        $tablaAncho = 195; // Ancho total de la tabla en mm (210 mm - 2 * 10 mm de márgenes)
        $anchoColumna = array(60, 50, 25, 60); // Ancho de cada columna sin la columna de fecha

        // Calcular la posición inicial para centrar la tabla
        $posX = (210 - $tablaAncho) / 2; // 210 mm es el ancho de A4
        $this->SetX($posX);

        // Imprimir cabeceras de la tabla
        /* $this->Cell($anchoColumna[0], 10, "N°", 1, 0, "C", true); */
        $this->Cell($anchoColumna[0], 10, "PROVEEDOR", 1, 0, "C", true);
        $this->Cell($anchoColumna[1], 10, "CONTACTO", 1, 0, "C", true);
        $this->Cell($anchoColumna[2], 10, "TELEFONO", 1, 0, "C", true);
        $this->Cell($anchoColumna[3], 10, "DIRECCION", 1, 1, "C", true);
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

// Ajustar el ancho total de la tabla (restar márgenes izquierdo y derecho)
$tablaAncho = 195; // Ancho total de la tabla en mm (210 mm - 2 * 10 mm de márgenes)
$anchoColumna = array(60, 50, 25, 60); // Ancho de cada columna sin la columna de fecha

// Ejecutar la consulta y agregar los datos al PDF
$sql = "SELECT id,nombre, empresa, telefono, direccion FROM proveedor";
if ($resultado = $mysqli->query($sql)) {
    while ($fila = $resultado->fetch_assoc()) {

        if ($pdf->GetY() > 250) { // Verifica si la posición Y está cerca del final de la página
            $pdf->AddPage(); // Añade una nueva página
            $pdf->TablaHeader(); // Imprime el encabezado de la tabla en la nueva página
        }

        $pdf->SetX((210 - $tablaAncho) / 2); // Asegurarse de estar en la posición correcta

        // Imprimir datos de la fila en mayúsculas
        /*         $pdf->Cell($anchoColumna[0], 10, strtoupper($fila['id']), 1, 0, "L"); */
        $pdf->Cell($anchoColumna[0], 10, strtoupper($fila['nombre']), 1, 0, "L");
        $pdf->Cell($anchoColumna[1], 10, strtoupper($fila['empresa']), 1, 0, "L");
        $pdf->Cell($anchoColumna[2], 10, strtoupper($fila['telefono']), 1, 0, "L");
        $pdf->Cell($anchoColumna[3], 10, strtoupper($fila['direccion']), 1, 1, "L");
    }
    $resultado->free();
} else {
    $pdf->Cell(0, 10, "Error en la consulta: " . $mysqli->error, 0, 1, "C");
}

// Cerrar y generar el PDF
$pdf->Output();
