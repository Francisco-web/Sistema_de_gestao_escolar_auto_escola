<?php	
		//referenciar o DomPDF com namespace
		use Dompdf\Dompdf;
	// include autoloader
	require_once("dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();
	
// Carrega seu HTML
$dompdf->loadhtml('
		<h1 style="text-align: center;">Celke - Relatório de Transações</h1>
		'. $html .'
	');
			//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
