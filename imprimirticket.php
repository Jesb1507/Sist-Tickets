<?php 
ob_start();
require "ticket.php";
$html = ob_get_clean();

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper("A4", "landscape");

$dompdf->render();

$dompdf->stream();
?>