
<?PHP
require "fpdf.php";
$connect = mysqli_connect('localhost', 'root','');
mysqli_select_db($connect,'gestc');

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

//Titulo da pagina
$pdf->settitle('Ficha de Matricula');

//cell (nome da imagem, posição x , posição y, largura opcional, altura opcional)
$pdf->image('../assets/img/logotipo.png' ,10,15,15,15);
$pdf->image('../assets/img/insignia.jpg' ,95,17,20,17);

//cell(width, height, text, border, em line, {align})

$pdf->cell(100 ,15,'',0,1); //fim da linha

//selecionar font to Arial, bold, 14pt
$pdf->setfont('times', 'B', 'font/times.php');

$pdf->cell(0 ,7,'',0,1,'C');
$pdf->cell(0 ,7,'',0,1,'C');
//selecionar font to Arial, regular, 12pt s
$pdf->cell(0 ,7,'REPUBLICA DE ANGOLA',0,0,'C');
$pdf->cell(0,7,'',0,1); //fim da linha

$pdf->cell(0 ,7,'MINISTERIO DA EDUCACAO',0,0,'C');
$pdf->cell(0 ,7,'',0,1); 
//fim da linha

$pdf->cell(0 ,7,'Colegio do Ensino Primario e do I Ciclo',0,0,'C');
$pdf->cell(0 ,7,'',0,1); 
 //fim da linha

$pdf->cell(0,7,'AUTO ESCOLA',0,1,'C');
$pdf->cell(0,7,'',0,1); //fim da linha

$pdf->cell(0,7,'',0,1,'C');
$pdf->cell(0,7,'FICHA DE INSCRICAO',0,1,'C');
$pdf->cell(26,7,'Ano Lectivo:',1,0,'L');

if (isset($_GET['id'])& isset($_GET['matricula'])& isset($_GET['inscricao'])) {
                                        
    $id_matricula = mysqli_escape_string($connect, $_GET['id']);
    $matricula = mysqli_escape_string($connect, $_GET['matricula']);
    $inscricao = mysqli_escape_string($connect, $_GET['inscricao']);

$resultado = mysqli_query($connect,"SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
join usuario u on i.id_usuario = u.id_usuario join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe where id_matricula='$id_matricula'and num_matricula='$matricula' and num_inscricao='$inscricao'");
$dados = mysqli_fetch_array($resultado);
//numero de clientes cadastrados
$pdf->cell(14,7,$dados['ano_academico'],1,1,'C');
$pdf->cell(40,7,$dados['num_inscricao'],1,0,'C');
$pdf->cell(0,7,$dados['nome_usuario'],1,1,'C');
$pdf->cell(0,7,'',0,1,'R');// fim da linha

//fonte do corpo
$pdf->setfont('times', '', 'font/times.php');

$pdf->cell(14 ,7,'Sexo:',1,0,'C');
$pdf->cell(33 ,7,$dados['sexo'],1,0,'L'); //fim da linhaL

$pdf->cell(15 ,7,'Classe:',1,0,'L');
$pdf->cell(33 ,7,$dados['nome_classe'],1,0,'L');

$pdf->cell(15 ,7,'Turma:',1,0,'L');
$pdf->cell(33,7,$dados['nome_turma'],1,0,'L');

$pdf->cell(14 ,7,'Turno:',1,0,'L');
$pdf->cell(33 ,7,$dados['periodo'],1,0,'L');
$pdf->cell(27 ,7,'',0,1,'L');

$pdf->cell(17 ,7,'Morada:',1,0,'L');
$pdf->cell(45 ,7,$dados['residencia'],1,0,'L');
$pdf->cell(17 ,7,'Cidade:',1,0,'L');
$pdf->cell(45 ,7,$dados['cidade'],1,0,'L');
$pdf->cell(21 ,7,'Municipio:',1,0,'L');
$pdf->cell(45 ,7,$dados['municipio'],1,1,'L');

$pdf->cell(28 ,7,'Enc/Educacao:',1,0,'L');
$pdf->cell(10 ,7,'Pai:',1,0,'L');
$pdf->cell(63 ,7,$dados['nome_pai'],1,0,'L');
$pdf->cell(11,7,'Mae:',1,0,'L');
$pdf->cell(0 ,7,$dados['nome_mae'],1,1,'L');

$pdf->cell(20 ,7,'',0,1,'L');
$pdf->cell(20 ,7,'Contactos',1,0,'L');
$pdf->cell(46 ,7,'',0,1,'L');
$pdf->cell(22 ,7,'Telemovel:',1,0,'L');
$pdf->cell(30 ,7,$dados['tel1'],1,0,'L');
$pdf->cell(21 ,7,'Telefone:',1,0,'L'); 
$pdf->cell(30 ,7,$dados['tel2'],1,0,'L'); 
$pdf->cell(14 ,7,'Email:',1,0,'L');
$pdf->cell(0 ,7,$dados['email'],1,1,'L'); 

$pdf->cell(61 ,7,'',0,1,'L');   
$pdf->cell(13 ,7,'Data:',1,0,'L');
$pdf->cell(50 ,7,$dados['data_matricula'],1,1,'L');
$pdf->cell(61 ,7,'',0,1,'L');  

$pdf->cell(0 ,7,'O Responsavel',0,1,'C');// fim da linha
$pdf->cell(35 ,7,'',0,1);
$pdf->cell(65 ,7,'',0,0);
$pdf->cell(60,0,'',1,1,'C');

} 

//footer- rodape
$pdf->footer(-15);
$pdf->SetFont('courier','','font/courier.php');
$pdf->Cell(0,0,'',0,0,'C');

$pdf->AliasNbPages();
$pdf->Output();

?>