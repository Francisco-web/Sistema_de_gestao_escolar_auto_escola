
<?PHP
require "fpdf.php";
$connect = mysqli_connect('localhost', 'root','');
mysqli_select_db($connect,'agendamento');

class myPDF extends FPDF{
    function header(){
   //selecionar font to Arial, bold, 14pt

//cell (nome da imagem, posição x , posição y, largura opcional, altura opcional)
$this->image('logo.jpg' ,17,10,20,20);

//cell(width, height, text, border, em line, {align})
$this->cell(40,3,'',0,0);
$this->setfont('Arial', 'B', '16');
$this->cell(100 ,5,'MWAMBA SOFT',0,0,'C');
$this->cell(100 ,30,'',0,1); //fim da linha

//selecionar font to Arial, bold, 14pt
$this->setfont('Arial', 'B', '12');

//selecionar font to Arial, regular, 12pt s
$this->cell(5 ,5,'',0,0);
$this->cell(90 ,5,'Cassequel, Aeroporto',0,0,'L');
$this->cell(59 ,5,'',0,1); //fim da linha

$this->cell(5 ,5,'',0,0);
$this->cell(90 ,7,'Luanda, Angola',0,0,'L');
$this->cell(20 ,7,'DATA',0,0,'L'); 
$this->cell(34 ,7,'03/12/2021',0,1,'L'); //fim da linha

$this->cell(5 ,5,'',0,0);
$this->cell(90 ,7,'TELEFONE +224 996935756',0,0,'L');

$this->cell(5 ,5,'',0,0);
$this->cell(90 ,7,'EMAIL mwamba@soft.com',0,0,'L');
$this->cell(25 ,7,'',0,0); 
$this->cell(34 ,17,'',0,1); //fim da linha

$this->cell(50 ,20,'',0,0); //fim da linha
$this->cell(70 ,10,'Lista de Agendamento Registados',0,0,'C');
//fazer as tabelas vazias como espaço vertical
$this->cell(189 ,15,'',0,1);// fim da linha

}

function footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'pagina'.$this->pageNo().'/{nb}',0,0,'C');
  }


//invoce contentes

function viewTable($connect){
    
    $sql = "SELECT a.id_agendar, a.id_cliente,a.id_usuario,c.nome_cliente, a.factura_num, a.nome_serv
    ,a.datag, a.forma_pag, a.preco_unitario, a.estado, a.descricao, c.municipio, c.bairro, c.rua, 
    c.num_casa,s.nome_servico, u.nome
    FROM agendar a inner join cliente c on a.id_cliente = c.id_cliente join usuario u 
    on a.id_usuario = u.id_usuario join servico s on a.id_servico = s.id_servico ORDER BY factura_num DESC";
    
    $resultado = mysqli_query($connect,$sql);
    while($dados = mysqli_fetch_array($resultado)){
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90 ,7,'Factura',0,0,'L'); 
        $this->setFont('Arial','',12);
        $this->Cell(90,7,$dados['factura_num'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90 ,7,'CLIENTE',0,0,'L'); 
        $this->setFont('Arial','',12);
        $this->Cell(90,7,$dados['nome_cliente'],0,1,'L');
        
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90 ,7,'LOCAL DE SERVICO',0,0,'L');
        $this->setFont('Arial','',12); 
        $this->Cell(90,7,$dados['nome_serv'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0); 
        $this->cell(90  ,7,'SERVICO',0,0,'L');  
        $this->setFont('Arial','',12);
        $this->Cell(90,7,$dados['nome_servico'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90  ,17,'DESCRICAO',0,0,'L');
        $this->setFont('Arial','',12);
        $this->Cell(90,17,$dados['descricao'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90 ,7,'PRECO UNI.',0,0,'L'); 
        $this->setFont('Arial','',12);
        $this->Cell(90,7,$dados['preco_unitario'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90 ,7,'FORMA DE PAGAMANTO',0,0,'L');
        $this->setFont('Arial','',12); 
        $this->Cell(90,7,$dados['forma_pag'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90 ,7,'ESTADO',0,0,'L'); 
        $this->setFont('Arial','',12);
        $this->Cell(90,7,$dados['estado'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90  ,7,'Atendido por',0,0,'L');
        $this->setFont('Arial','',12);
        $this->Cell(90,7,$dados['nome'],0,1,'L');
    
        $this->setFont('Arial','B',12);
        $this->cell(5 ,5,'',0,0);
        $this->cell(90  ,7,'Data',0,0,'L'); 
        $this->setFont('Arial','',12);
        $this->Cell(90,7,$dados['datag'],0,1,'L');
        $this->cell(90  ,10,'',0,1);

    }      
    }	
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0); 
$pdf->viewTable($connect);
$pdf->Output();

?>