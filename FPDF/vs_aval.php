
<?PHP
require "fpdf.php";
$connect = mysqli_connect('localhost', 'root','');
mysqli_select_db($connect,'agendamento');

$pdf = new FPDF('p','mm','A5');
$pdf->AddPage();

//Titulo da pagina
$pdf->settitle('Ficha de Matricula');

//cell (nome da imagem, posição x , posição y, largura opcional, altura opcional)
$pdf->image('../assets/img/logotipo.png' ,7,5,15,15);
$pdf->image('../assets/img/insignia.jpg' ,64,7,17,17);

//cell(width, height, text, border, em line, {align})

$pdf->cell(100 ,15,'',0,1); //fim da linha

//selecionar font to Arial, bold, 14pt
$pdf->setfont('times', 'B', 'font/times.php');

//selecionar font to Arial, regular, 12pt s
$pdf->cell(127 ,7,'REPUBLICA DE ANGOLA',0,0,'C');
$pdf->cell(0,7,'',0,1); //fim da linha

$pdf->cell(127 ,7,'MINISTERIO DA EDUCACAO',0,0,'C');
$pdf->cell(0 ,7,'',0,1); 
//fim da linha

$pdf->cell(127 ,7,'Colegio do Ensino Primario e do I Ciclo',0,0,'C');
$pdf->cell(0 ,7,'',0,1); 
 //fim da linha

$pdf->cell(127,7,'AUTO ESCOLA',0,0,'C');
$pdf->cell(0 ,7,'',0,0,'R'); 
$pdf->cell(0,7,'',0,1); //fim da linha

$pdf->cell(58,7,'',0,1,'R');
$pdf->cell(58,7,'DISTRITO DA MAIANGA',0,0,'C');

//numero de clientes cadastrados
$pdf->cell(57,7,'Profissionais cadastrados',0,1,'C');
$pdf->cell(20  ,7,'',0,1,'R');// fim da linha

$pdf->cell(90 ,7,'EMAIL [mwamba@soft.com]',0,0,'C');
$pdf->cell(25 ,7,'',0,0); 
$pdf->cell(34 ,7,'',0,1); //fim da linha

$pdf->cell(85 ,20,'',0,0); //fim da linha
$pdf->cell(100 ,20,'Lista de Profissionais Cadastrados',0,0,'C');
//fazer as tabelas vazias como espaço vertical
$pdf->cell(189 ,15,'',0,1);// fim da linha

//invoce contentes
$pdf->setFont('Arial','B',12);

$pdf->cell(65 ,7,'NOME',1,0);
$pdf->cell(60 ,7,'Bilhete de Indentidade',1,0);
$pdf->cell(40 ,7,'Perfil',1,0);
$pdf->cell(60  ,7,'EMAIL',1,0);
$pdf->cell(40  ,7,'TELEFONE',1,1);// fim da linha

$pdf->setFont('Arial','',12);

//numeros alinhados a 
//direitas daremos um 'R' depois danova linha
$resultado = mysqli_query($connect,"SELECT * FROM usuario");
while($dados = mysqli_fetch_array($resultado)){
    $pdf->Cell(65,7,$dados['nome'],1,0,'L');
    $pdf->Cell(60,7,$dados['bi'],1,0,'L');
    $pdf->Cell(40,7,$dados['perfil'],1,0,'L');
    $pdf->Cell(60,7,$dados['email'],1,0,'L');
    $pdf->Cell(40,7,$dados['telefone'],1,1,'L');
}      


//footer- rodape
$pdf->footer(-15);
$pdf->SetFont('courier','','font/courier.php');
$pdf->Cell(0,10,'pagina'.$pdf->pageNo().'/{nb}',0,0,'C');

$pdf->AliasNbPages();
$pdf->Output();

?>