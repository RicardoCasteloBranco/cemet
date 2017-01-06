<?php
$ger = new \CasteloBranco\Cemet\Modules\Turma\Controller\TurmaController();
$dados = $ger->indexAction();
$curso = $dados["curso"];
$companhia = $dados["companhia"];
?>
<h2>Turmas - <?php echo $companhia->getCompanhia()."/".$curso->getSiglaCurso().
        "/".date("Y",strtotime($companhia->getDataInicio()));?></h2>
<h3 id="local">Local: <?php echo $companhia->getLocal();?></h3>

<button onclick="location.href='?module=Turma&page=add.php&idcompanhia=<?php echo $companhia->getIdCompanhia(); ?>'">Adiciona</button>
<button onclick="location.href='?module=Companhia&page=show.php&idcurso=<?php echo $companhia->getIdCurso(); ?>'">Voltar</button>

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
                <a href="?module=Turma&page=edit.php&idturma=<?php echo $row->idturma; ?>">Editar Turma</a>
                |
                <?php if(is_null($row->coordenador)):?>
                <a href="?module=Coordenador&page=add.php&idturma=<?php echo $row->idturma; ?>">Inserir Coordenador</a>
                <?php else:?>
                <a href="?module=Coordenador&page=edit.php&idturma=<?php echo $row->idturma; ?>">Alterar Coordenador</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>