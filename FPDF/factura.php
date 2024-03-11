
<?PHP
require "fpdf.php";
$connect = mysqli_connect('localhost', 'root','');
mysqli_select_db($connect,'agendamento');

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

//selecionar font to Arial, bold, 14pt
$pdf->setfont('Arial', 'B', '14');

//cell(width, height, text, border, emd line, {align})
$pdf->cell(130 ,5,'MWAMBA SOFT',0,0);
$pdf->cell(59 ,5,'FACTURA',0,1); //fim da linha

//selecionar font to Arial, regular, 12pt s
$pdf->cell(130 ,5,'[ENDERECO RUA]',0,0);
$pdf->cell(59 ,5,'',0,1); //fim da linha

$pdf->cell(130 ,5,'[CIDADE, PAIS]',0,0);
$pdf->cell(25 ,5,'DATA',0,0); 
$pdf->cell(34 ,5,'[dd/mm/yyyy]',0,1); //fim da linha

$pdf->cell(130 ,5,'TELEFONE [+224 996935756]',0,0);
$pdf->cell(25 ,5,'Fact. Num',0,0); 
$pdf->cell(34 ,5,'[12211]',0,1); //fim da linha

$pdf->cell(130 ,5,'EMAIL [+224 996935756]',0,0);
$pdf->cell(25 ,5,'NIF',0,0); 
$pdf->cell(34 ,5,'[12211]',0,1); //fim da linha

//fazer as tabelas vazias como espaço vertical
$pdf->cell(189 ,10,'',0,1);// fim da linha

//billing endereço
$pdf->cell(100 ,5,'Bill to',0,1);// fim da linha

//espaços de identiificação de tabelas
$pdf->cell(10 ,5,'',0,0);
$pdf->cell(90 ,5,'[NOME]',0,1);

$pdf->cell(10 ,5,'',0,0);
$pdf->cell(90 ,5,'[Nome da Empresa]',0,1);

$pdf->cell(10 ,5,'',0,0);
$pdf->cell(90 ,5,'[ENDERECO]',0,1);

$pdf->cell(10 ,5,'',0,0);
$pdf->cell(90 ,5,'[Telefone]',0,1);

//fazer as tabelas vazias como espaço vertical
$pdf->cell(189 ,10,'',0,1);// fim da linha

//invoce contentes
$pdf->setFont('Arial','B',12);

$pdf->cell(130 ,5,'Descricao',1,0);
$pdf->cell(25  ,5,'Taxable',1,0);
$pdf->cell(34  ,5,'Amount',1,1);// fim da linha

$pdf->setFont('Arial','',12);

//numeros alinhados a 
//direitas daremos um 'R' depois danova linha
$pdf->cell(130 ,5,'ULTRACOOL FRIGD',1,0);
$pdf->cell(25  ,5,'-',1,0);
$pdf->cell(34  ,5,'3,250',1,1);// fim da linha

$pdf->cell(130 ,5,'SUPERCLEAN',1,0);// fim da linha
$pdf->cell(25  ,5,'-',1,0);
$pdf->cell(34  ,5,'1,250',1,1);// fim da linha

$pdf->cell(130 ,5,'SUPERTHING ELSE',1,0);
$pdf->cell(25  ,5,'-',1,0);
$pdf->cell(34  ,5,'1,000',1,1);// fim da linha

//summary
$pdf->cell(130  ,5,'',0,0);
$pdf->cell(25 ,5,'SUBTOTAL',0,0);
$pdf->cell(4  ,5,'$',1,0);
$pdf->cell(30  ,5,'0',1,1,'R');// fim da linha

$pdf->cell(130  ,5,'',0,0);
$pdf->cell(25 ,5,'TAXABLE',0,0);
$pdf->cell(4  ,5,'$',1,0);
$pdf->cell(30  ,5,'5,500,00',1,1,'R');// fim da linha

$pdf->cell(130  ,5,'',0,0);
$pdf->cell(25 ,5,'TAX RATE',0,0);
$pdf->cell(4  ,5,'$',1,0);
$pdf->cell(30  ,5,'10%',1,1,'R');// fim da linha

$pdf->cell(130  ,5,'',0,0);
$pdf->cell(25 ,5,'TOTAL DUE',0,0);
$pdf->cell(4  ,5,'$',1,0);
$pdf->cell(30  ,5,'5,500,00',1,1,'R');// fim da linha

$pdf->Output();

?>