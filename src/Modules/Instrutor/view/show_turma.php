<?php
$ger = new \CasteloBranco\Cemet\Modules\Turma\Controller\TurmaController();
$dados = $ger->indexAction();
$curso = $dados["curso"];
$companhia = $dados["companhia"];
?>
<h2>Turmas - <?php echo $companhia->getCompanhia()."/".$curso->getSiglaCurso().
        "/".date("Y",strtotime($companhia->getDataInicio()));?></h2>
<h3 id="local">Local: <?php echo $companhia->getLocal();?></h3>
<button onclick="location.href='?module=Instrutor&page=show_curso.php&idcurso=<?php echo $companhia->getIdCurso(); ?>'">Voltar</button>

<table class="sortable">
    <thead>
        <tr>
            <th>Turma</th><th>Sala</th><th>Coordenador</th>
            <th>Qtd de Alunos</th><th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados["turmas"] as $row): ?>
        <tr>
            <td><?php echo $row->turma; ?></td>
            <td><?php echo $row->sala; ?></td>
            <td><?php echo $row->coordenador; ?></td>
            <td><?php echo $row->qtd_alunos; ?></td>
            <td>
                <a href="?module=Instrutor&page=show_instrutor.php&idturma=<?php echo $row->idturma; ?>">Instrutores</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>