<?php
include_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cemet/vendor/autoload.php";
require(filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cemet/vendor/setasign/fpdf/mc_table.php");
define("FPDF_FONTPATH",filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cemet/vendor/setasign/fpdf/font/");
$ger = new \CasteloBranco\Cemet\Modules\Disciplina\Controller\DisciplinaController();
$dados = $ger->printAction();
$disciplina = $dados["disciplina"];
$curso = $dados["curso"];

$pdf = new PDF_MC_Table("L", "pt", "A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(90);
//Cabeçalho
$pdf->Image("../../../public/img/acides.png", 380, 2, -500);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 16, 'ACADEMIA INTEGRADA DE DEFESA SOCIAL', 0, 1, 'C');
$pdf->SetFont('Times', "", 10);
$pdf->Cell(0, 14, utf8_decode('Instituição de Ensino Superior Credenciada pelo Parecer CEE/PE nr.: 33/2008 - CES, do Conselho Estadual de Educação de Pernambuco'), 0, 1, 'C');
$pdf->Cell(0, 14, utf8_decode('Homologado pela Portaria SE nr.: 3571, de 12/05/2008, publicada no DOE de 13/05/2008.'), 0, 1, 'C');
$pdf->Cell(0, 14, 'CNPJ: 02.960.040/0002-91', 0, 1, 'C');
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 20, 'PLANO DE ENSINO DE DISCIPLINA', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 16, utf8_decode('I - DADOS DE IDENTIFICAÇÃO'), 1, 1, 'L');
$pdf->SetFont('');
$pdf->Cell(385, 14, utf8_decode("Disciplina: " . $disciplina->getDisciplina()), 1, 0, 'L');
$pdf->Cell(400, 14, utf8_decode("Campus: Campus de Ensino Metropolitano - I"), 1, 1, 'L');
$pdf->Cell(325, 14, utf8_decode("Carga Horária: " . $disciplina->getCargaHoraria() . " h/a"), 1, 0, "L");
$pdf->Cell(460, 14, utf8_decode("Curso: " . $curso->getNomeCurso()), 1, 1, "L");
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(0, 16, utf8_decode("II - COMPETÊNCIAS CONSTRUÍDAS"), 1, 1, 'L');
$pdf->Cell(262, 14, "Conhecimento", 1, 0, "C");
$pdf->Cell(262, 14, "Habilidade", 1, 0, "C");
$pdf->Cell(261, 14, "Atitude", 1, 1, "C");
$posX = 28.5;
$posY = $pdf->GetY();
$pdf->SetFont("Arial", "", 11);
$pdf->SetWidths(array(262, 262, 261));
$pdf->SetAligns(array("J", "J", "J"));
$pdf->Row(array(utf8_decode($disciplina->getConhecimento()), utf8_decode($disciplina->getHabilidade()), utf8_decode($disciplina->getAtitude())));
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(0, 16, "III - EMENTA", 1, 1, "L");
$pdf->SetFont("");
$pdf->MultiCell(0, 14, utf8_decode($disciplina->getEmenta()), 1, "J");
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(0, 16, "IV - UNIDADES DE APRENDIZAGEM", 1, 1, "L");
$pdf->Cell(30, 14, "H/A", 1, 0, "C");
$pdf->Cell(150, 14, utf8_decode("Objetivos Especificos"), 1, 0, "C");
$pdf->Cell(160, 14, utf8_decode("Conteúdos Programáticos"), 1, 0, "C");
$pdf->Cell(175, 14, utf8_decode("Orientações Pedagógicas"), 1, 0, "C");
$pdf->Cell(120, 14, utf8_decode("Instrutor Secundário"), 1, 0, "C");
$pdf->Cell(150, 14, utf8_decode("Eixos Temáticos"), 1, 1, "C");
$pdf->SetFont("Arial", "", 11);
$pdf->SetWidths(array(30, 150, 160, 175, 120, 150));
$pdf->SetAligns(array("C", "J", "J", "J", "C", "J"));
srand(microtime() * 10000);
foreach ($dados["aulas"] as $aulas) {
    if ($aulas->instrutor_secundario == 1) {
        $secundario = utf8_decode("Sim");
    } else {
        $secundario = utf8_decode("Não");
    }
    $pdf->Row(array($aulas->qtd_aulas, utf8_decode($aulas->objetivo), utf8_decode($aulas->conteudo), utf8_decode($aulas->relacao), $secundario, utf8_decode($aulas->eixo)));
}
$posY = $pdf->GetY();
$pdf->SetXY(28.5, $posY);
$pdf->SetFont("Arial", "B", 14);
$pdf->Cell(0, 14, "V - BIBLIOGRAFIA", 1, 1, "L");
$pdf->SetFont("");
$pdf->MultiCell(0, 14, utf8_decode($disciplina->getBibliografia()), 1, "J");
$nomeArquivo = "Plano de Disciplina " . utf8_decode($disciplina->getDisciplina()) . " " . $curso->getSiglaCurso() . ".pdf";
$pdf->Output();
