<?php

require('./fpdf.php');
date_default_timezone_set('America/Bogota');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      $this->Image('logo.png', 10, 5, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      //creamos una celda o fila
      $this->Ln(1); // Salto de línea

      /* Direccion */
      $this->Cell(220);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Dirección : Carrera 69B # 66-66 "), 0, 0, '', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(220);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 319455555 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(220);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : soporte@invetex.com "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(220);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Bogotá"), 0, 0, '', 0);
      $this->Ln(20);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(241, 93, 10);
      $this->Cell(80); // mover a la derecha
      $this->SetFont('Arial', 'B', 17);
      $this->Cell(100, 10, utf8_decode("Reporte total insumos "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(24, 63, 70); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(30, 10, utf8_decode('Referencia'), 1, 0, 'C', 1);
      $this->Cell(75, 10, utf8_decode('Insumo'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Und Ingresadas'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Valor ingresos'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Und vendidas'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('valor vendido'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Stock actual'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include ('../db/conexion.php');//Conexion a base de datos
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage('landscape'); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$reporte = $conexion->query("SELECT  referencia, nombre_insumo, SUM(cantidad_entrada) AS 'Unidades_ingresadas', SUM(valor_entrada) AS 'Valor_ingresado',SUM(cantidad_salida) AS 'Unidades_vendidas', SUM(valor_salida) AS 'Valor_vendido', if( isnull(SUM(cantidad_salida)), SUM(cantidad_entrada), SUM(cantidad_entrada) - SUM(cantidad_salida)) as 'stock' from inventario
left join entrada_insumo
on fk_entrada = idEntrada_insumo
left join salida_insumo
on fk_salida = idSalida_insumo
left join insumo
on fk_insumo = Id_insumo
group by fk_insumo;");

while ($datos = $reporte->fetch_object()) {
   /* TABLA */
   $pdf->Cell(30, 10, utf8_decode($datos->referencia), 1, 0, 'C', 0);
   $pdf->Cell(75, 10, utf8_decode($datos->nombre_insumo), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos->Unidades_ingresadas), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos->Valor_ingresado), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos->Unidades_vendidas), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos->Valor_vendido),1, 0,'C',0 );
   $pdf->Cell(30, 10, utf8_decode($datos->stock), 1, 1, 'C', 0);
   
}

$pdf->Output('Reporte.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
