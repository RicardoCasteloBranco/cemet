<?php
$ger = new \CasteloBranco\Cemet\Modules\Instrutor\Controller\InstrutorController();
$dados = $ger->indexAction();
$turma = $dados["turma"];
$curso = $dados["curso"];
$cia = $dados["companhia"];
?>
<h2><?php echo "Instrutores: ".$turma->getTurma()." - ".$cia->getCompanhia()." - ".$curso->getSiglaCurso()."/".date("Y",strtotime($cia->getDataInicio())); ?></h2>
<table class="sortable">
    <thead>
        <tr>
            <th>Disciplina</th><th>Instrutores</th><th>Matricula</th>
            <th>Tipo Instrutor</th><th>Inscrição</th><th>Desistência</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["instrutores"] as $row): ?>
        <tr>
            <td><?php echo $row->disciplina; ?></td>
            <td><?php echo $row->instrutor; ?></td>
            <td><?php echo $row->matricula; ?></td>
            <td><?php echo $row->tipo_instrutor; ?></td>
            <td><?php echo !is_null($row->datainscricao)?date("d/m/Y",strtotime($row->datainscricao)):null; ?></td>
            <td><?php echo !is_null($row->datadesistencia)?date("d/m/Y",strtotime($row->datadesistencia)):null; ?></td>
            <td>
                <a href="?module=Instrutor&page=add.php&iddisciplina=<?php echo $row->iddisciplina;?>&idturma=<?php echo $row->idturma; ?>">Inserir Instrutor</a>
                <?php if(!is_null($row->instrutor)):?>
                |
                <a href="?module=Instrutor&page=edit.php&idinstrutor=<?php echo $row->idinstrutor; ?>">Alterar Instrutor</a>
                <?php endif;?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>