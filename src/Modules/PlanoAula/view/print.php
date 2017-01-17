<?php
include_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/vendor/autoload.php";
$ger = new CasteloBranco\Cemet\Modules\PlanoAula\Controller\PlanoAulaController();
$dados = $ger->printAction();
$plano = $dados["plano"];
$disciplina = $dados["disciplina"];
$turma = $dados["turma"];
$curso = $dados["curso"];
$aula = $dados["aula"];
$instrutor = $dados["instrutor"];

$pdf = new FPDF("P", "pt", "A4");
$pdf->AddPage();
$pdf->Ln(10);
$turno = $plano->getTurno();
//cabeï¿œalho
$pdf->SetFont('arial', '', 10);
$pdf->Cell(150, 15, "Qtd de aulas ministradas: " . $plano->getQtdAula() . " h/a", 0, 0, 'L');
$pdf->Cell(330, 15, "", 0, 0, 'L');
//verifica se o turno Ã© manhÃ£
$pdf->Cell(40, 15, utf8_decode("Manhã"), 0, 0, 'L');
if ($turno[0] == 1) {
    $pdf->Cell(10, 15, "(X)", 0, 1, 'L');
} else {
    $pdf->Cell(10, 15, "(  )", 0, 1, 'L');
}
$pdf->Cell(200, 15, "Aula: " . ($dados['qtdAulas']+$plano->getQtdAula()) ." de " . $disciplina->getCargaHoraria() . " h/a", 0, 0, 'L');
$pdf->Cell(280, 15, "", 0, 0, 'L');
//verifica se o turno Ã© tarde
$pdf->Cell(40, 15, "Tarde", 0, 0, 'L');
if ($turno[0] == 2) {
    $pdf->Cell(10, 15, "(X)", 0, 1, 'L');
} else {
    $pdf->Cell(10, 15, "(  )", 0, 1, 'L');
}
$pdf->Cell(40, 15, "Data: " . date("d/m/Y",strtotime($plano->getData())), 0, 0, 'L');
$pdf->Cell(440, 15, "", 0, 0, 'L');
//verifica se o turno noite
$pdf->Cell(40, 15, "Noite", 0, 0, 'L');
if ($turno[0] == 3) {
    $pdf->Cell(10, 15, "(X)", 0, 1, 'L');
} else {
    $pdf->Cell(10, 15, "(  )", 0, 1, 'L');
}
//Plano de Aula
$pdf->SetFont('arial', 'B', 12);
$pdf->Cell(0, 30, "PLANO DE AULA", 0, 1, 'C');
//data
$pdf->SetFont('arial', '', 10);
$pdf->Cell(60, 15, "Disciplina: ", 0, 0, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(230, 15, utf8_decode($disciplina->getDisciplina()), 0, 0, 'L');
$pdf->SetFont('arial', '', 10);
$pdf->Cell(40, 15, "Turma: ", 0, 0, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(120, 15, $turma->getTurma(), 0, 0, 'L');
$pdf->SetFont('arial', '', 10);
$pdf->Cell(40, 15, "Curso: ", 0, 0, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(80, 15, $curso->getSiglaCurso(), 0, 1, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(0, 15, "", 0, 1, 'L');
$pdf->Cell(0, 15, utf8_decode("Objetivos Específicos"), 0, 1, 'C');
$pdf->SetFont('arial', '', 10);
$pdf->MultiCell(0, 15, utf8_decode($aula->getObjetivo()), 1, 'L');
//Corpo do Plano de Aula
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(0, 15, "", 0, 1, 'L');
$pdf->Cell(0, 15, utf8_decode("Conteúdo"), 0, 1, 'C');
$pdf->SetFont('arial', '', 10);
$pdf->MultiCell(0, 15, utf8_decode($aula->getConteudo()), 1, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(0, 15, "", 0, 1, 'L');
$pdf->Cell(0, 15, "Eixos Trabalhados", 0, 1, 'C');
$pdf->SetFont('arial', '', 10);
$pdf->MultiCell(0, 15, utf8_decode($aula->getEixo()), 1, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(0, 15, "", 0, 1, 'L');
$pdf->Cell(0, 15, utf8_decode("Procedimentos Metodológicos"), 0, 1, 'C');
$pdf->SetFont('arial', '', 10);
$pdf->MultiCell(0, 15, utf8_decode($plano->getMetodologia()), 1, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(0, 15, "", 0, 1, 'L');
$pdf->Cell(0, 15, utf8_decode("Recursos Didáticos"), 0, 1, 'C');
$pdf->SetFont('arial', '', 10);
$pdf->MultiCell(0, 15, utf8_decode($plano->getMeios()), 1, 'L');
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(0, 15, "", 0, 1, 'L');
$pdf->Cell(0, 15, utf8_decode("Avaliação"), 0, 1, 'C');
$pdf->SetFont('arial', '', 10);
$pdf->MultiCell(0, 15, utf8_decode($plano->getAvaliacao()), 1, 'L');
$pdf->SetFont('arial', '', 8);
$pdf->Cell(110, 40, "Plano de aula criado por: ", 0, 0, 'L');
$pdf->Cell(250, 40, $instrutor, 0, 0, 'L');
$pdf->Cell(20, 40, "Em: ", 0, 0, 'L');
$pdf->Cell(90, 40, date("d/m/Y",strtotime($plano->getDataCriacao())), 0, 1, 'L');
$pdf->Cell(180, 30, "", 0, 1, 'C');
$pdf->SetFont('arial', '', 8);
$pdf->Cell(0, 10, $dados["coordenador"], 0, 1, 'C');
$pdf->Cell(0, 10, "Coordenador", 0, 1, 'C');
$pdf->SetFont('arial', 'I', 8);
$pdf->Cell(0, 10, '', 0, 1, 'C');
$pdf->MultiCell(0, 10, utf8_decode("   Nós instrutores declaramos que os itens acima estão conforme o Plano de Disciplina estabelecido em reunião pedagógica e de comum acordo com os demais instrutores da disciplina deste curso.
Sendo assim assumimos o compromisso de ministrar a aula conforme aqui planejado."), 0, 'J');
$pdf->SetFont('arial', '', 8);
$pdf->Cell(0, 30, "", 0, 1, 'C');
$pdf->SetFont('arial', '', 8);
$pos_x = $pdf->GetX();
$pos_y = $pdf->GetY(); //captura a posiÃ§Ã£o atual
$contador = 1;
foreach ($dados["instrutores"] as $inscricao) {
    if ($contador % 2 == 0) {
        $marca = 1;
    } else {
        $marca = 0;
    }
    if ($inscricao->tipo_instrutor == "Secundario") {
        if ($aula->getInstrutorSecundario() == "true") {
            $pdf->SetXY($pos_x, $pos_y);
            $pdf->Cell(250, 10, $inscricao->abreviatura." ".utf8_decode($inscricao->nome), 0, 0, 'C');
            $pdf->SetXY($pos_x, $pos_y + 10);
            $pdf->Cell(250, 10, "Instrutor " . $inscricao->tipo_instrutor, 0, 0, 'C');
            $pos_x = $pdf->GetX();
            $pos_y = $pdf->GetY();
            if ($contador % 2 == 0) {
                $pos_x = ($pos_x) - 500;
                $pos_y = ($pos_y) + 40;
            } else {
                $pos_x = ($pos_x);
                $pos_y = ($pos_y) - 10;
            }
            $contador++;
        }
    } else {
        $pdf->SetXY($pos_x, $pos_y);
        $pdf->Cell(250, 10, $inscricao->abreviatura." ".utf8_decode($inscricao->nome), 0, 0, 'C');
        $pdf->SetXY($pos_x, $pos_y + 10);
        $pdf->Cell(250, 10, "Instrutor " . $inscricao->tipo_instrutor, 0, 0, 'C');
        $pos_x = $pdf->GetX();
        $pos_y = $pdf->GetY();
        if ($contador % 2 == 0) {
            $pos_x = ($pos_x) - 500;
            $pos_y = ($pos_y) + 40;
        } else {
            $pos_x = ($pos_x);
            $pos_y = ($pos_y) - 10;
        }
        $contador++;
    }
}
$pdf->Cell(1, 10, "", 0, 1, 'C');
$pdf->Output("Plano_de_aula.pdf", "I");
