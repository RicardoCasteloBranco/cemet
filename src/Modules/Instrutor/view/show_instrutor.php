<?php
$ger = new \CasteloBranco\Cemet\Modules\Instrutor\Controller\InstrutorController();
$dados = $ger->indexAction();
$turma = $dados["turma"];
$curso = $dados["curso"];
$cia = $dados["companhia"];
?>
<h2><?php echo "Instrutores: ".$turma->getTurma()." - ".$cia->getCompanhia()." - ".$curso->getSiglaCurso()."/".date("Y",strtotime($cia->getDataInicio())); ?></h2>
<button onclick="location.href='?module=Instrutor&page=show_turma.php&idcompanhia=<?php echo $turma->getCompanhia(); ?>'">Voltar</button>
<table class="sortable">
    <thead>
        <tr>
            <th>Disciplina</th><th>Posto/Grad</th><th>Nome</th>
            <th>email</th><th>Tipo Instrutor</th><th>Inscrição</th>
            <th>Desistencia</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados["instrutores"] as $row): ?>
        <tr>
            <td><?php echo $row->disciplina; ?></td>
            <td><?php echo $row->abreviatura; ?></td>
            <td><?php echo $row->nome; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->tipo_instrutor; ?></td>
            <td><?php echo is_null($row->datainscricao)?NULL:date("d/m/Y",strtotime($row->datainscricao)); ?></td>
            <td><?php echo is_null($row->datadesistencia)?NULL:date("d/m/Y",strtotime($row->datadesistencia)); ?></td>
            <td>
                <a href="?module=Instrutor&page=add.php&iddisciplina=<?php echo $row->iddisciplina;?>&idturma=<?php echo $row->idturma; ?>">Inserir Instrutor</a>
                <?php if(!is_null($row->nome)):?>
                |
                <a href="?module=Instrutor&page=edit.php&idinstrutor=<?php echo $row->idinstrutor; ?>">Alterar Instrutor</a>
                <?php endif;?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>